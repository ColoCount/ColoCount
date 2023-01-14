import React, { useState, useEffect } from 'react'
import {login} from "../../AuthContext/apiCalls";


const AddColoc = () => {
    const [nameColoc, setNameColoc] = useState("");
    const [description, setDescription] = useState("");

    const handleColoc = (e) => {
        e.preventDefault();
        //login({ nameColoc, description }, dispatch);
    }


    // Using Fetch API
    useEffect(() => {
        fetch('http://localhost:1501/posts?_limit=5')
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
                //setPosts(data);
            })
            .catch((err) => {
                console.log(err.message);
            });
    }, []);

    return (
        <div className='vh-100 modale modale-add-coloc flex-center'>
            <div className="box-shadow-modale box-model">
                <div className="cross-modale"></div>
                <h2 className="text-center">Ajouter une nouvelle coloc</h2>
                <form>
                    <div className="fields-column two-fields">
                        <div className="fields-row mb-4">
                            <input type="text" id="form3Example3" className="form-control form-control-lg" placeholder="Titre" onChange={(e) => setNameColoc(e.target.value)}/>
                        </div>
                        <div className="fields-row mb-4">
                            <textarea type="text" id="form3Example3" className="form-control form-control-lg" placeholder="Description" onChange={(e) => setDescription(e.target.value)}/>
                        </div>
                    </div>
                    <div className="fields-column field-title">
                        <h3>Ajouter des participants</h3>
                        <div className="fields-row mb-4">
                            <input type="text" id="form3Example3" className="form-control form-control-lg" placeholder="Adresse mail des participants"/>
                        </div>
                    </div>
                    <div className="bloc-btn">
                        <button type="submit" onClick={handleColoc} >Ajouter la coloc</button>
                    </div>
                </form>
            </div>
        </div>

    )
}
export default AddColoc