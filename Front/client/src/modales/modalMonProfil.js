import React, { useState, useEffect } from 'react'
import iconModif from "../assets/images/icons/icon-modif.svg";
import ProfilPhoto from "../components/ProfilPhoto";
import '../assets/css/modales/modale-mon-profile.css';


const MonProfil = () => {
    const [username, setusername] = useState("");
    const [password, setpassword] = useState("");
    const [profilPicture, setProfilPicture] = useState("");


    const handleUser = (e) => {
        e.preventDefault();
        //login({ nameColoc, description }, dispatch);
    }

    // // Using Fetch API
    // useEffect(() => {
    //     fetch('http://localhost:1501/posts?_limit=5')
    //         .then((res) => res.json())
    //         .then((data) => {
    //             console.log(data);
    //             //setPosts(data);
    //         })
    //         .catch((err) => {
    //             console.log(err.message);
    //         });

    // }, []);

     const componentDidMount = () => {
        fetch('http://localhost:1501/users').then((response) => {
            console.log(response.json());
        })
    }




    return (
        <div className='vh-100 modale modale-profile flex-center'>
            <div className="box-shadow-modale box-model">
                <div className="box-model-scroll">
                    <div className="cross-modale"></div>
                    <h2 className="text-center">Mon profil</h2>
                    <div className="image-profil">
                        <div className="image-mon-profile">
                            <ProfilPhoto/>
                            <div className="overlay-photo" id="iconModifPseudo">
                                <div className="icon-modif-profil">
                                    <img src={iconModif}/>
                                </div>
                            </div>
                        </div>
                        <form className="form-profil form-image">
                            <div className="fields-column one-fields profile-picture">
                                <div className="fields-row">
                                    <div className="img-wrap img-upload">
                                        <img htmlFor="photo-upload" src="Front/client/src/modales/modalMonProfil"/>
                                    </div>
                                    {/* <input id="photo-upload" type="file" onChange={(e) => setProfilPicture(e.target.value)}/> */}
                                </div>
                            </div>
                            <button type="submit" onClick={handleUser} className="link para-16 medium text-center" >Mettre à jour ma photo</button>
                        </form>
                    </div>
                    <div className="pseudo-profil">
                        <div className="pseudo-mon-profile">
                            <h3 className="text-center">Pseudo à afficher</h3>
                            <div className="icon-modif-profil">
                                <img src={iconModif}/>
                            </div>
                        </div>
                        <form className="form-profil form-pseudo">
                            <div className="fields-row">
                                <input type="text" id="form3Example3" className="form-control form-control-lg" placeholder="Pseudo à afficher" onChange={(e) => setusername(e.target.value)}/>
                            </div>
                            <button type="submit" onClick={handleUser} className="link para-16 medium text-center" >Mettre à jour mon pseudo</button>
                        </form>
                    </div>
                    <div className="email-profil">
                        <div className="email-mon-profile">
                            <h3 className="text-center">Mon adresse mail</h3>
                            <p className="text-center">adresse à afficher</p>
                        </div>
                    </div>
                    <div className="password-profil">
                        <h3 className="text-center">Mon mot de passe</h3>
                        <div className="password-mon-profile">
                            <div className="bloc-icon">
                                <p className="text-center">******</p>
                                <div className="icon-modif-profil" id="iconModifPassword">
                                    <img src={iconModif}/>
                                </div>
                            </div>
                        </div>
                        <form className="form-profil form-password">
                            <div className="fields-column tree-fields password">
                                <div className="fields-row">
                                    {/* <input type="text" id="ancien" className="form-control form-control-lg" placeholder="Ancien mot de passe" onChange={(e) => setancienPwd(e.target.value)}/> */}
                                </div>
                                <div className="fields-row">
                                    {/* <input type="text" id="nouveau" className="form-control form-control-lg" placeholder="Nouveau mot de passe" onChange={(e) => setnouveauPwd(e.target.value)}/> */}
                                </div>
                                <div className="fields-row">
                                    {/* <input type="text" id="confirmation" className="form-control form-control-lg" placeholder="Confirmation du nouveau mot de passe" onChange={(e) => setconfNouveauPwd(e.target.value)}/> */}
                                </div>
                            </div>
                            {/* <button type="submit" onClick={handleUser} className="link para-16 medium text-center" >Modifier mon mot de passe</button> */}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    )
}
export default MonProfil