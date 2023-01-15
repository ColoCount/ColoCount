import React, { useEffect, useState } from 'react'
import {Link} from "react-router-dom";
import iconArrow from "../../assets/images/icons/button-arrow.svg"

const Coloc = () => {
  const [colocations, setColocations] = useState([]);
  const [loading, setLoading] = useState(true);

useEffect(() => {
    setLoading(true);
    fetch('http://localhost:1501/mes_colocs')
        .then(response => response.json())
        .then(data =>{setColocations (data[0])
            console.log(data.data)
        })

        .catch(error => console.log(error))
        .finally(() => setLoading(false));

}, []);

if (loading) {
  return <p>Loading...</p>;
}
return (
  <div className="vh-100 page page-home">
      <div className='home-container' >
          <h1 className="text-center">Mes colocs</h1>
          <div className="home-cards">
              {colocations.map(colocation => (
                  <div className="box-model box-shadow-1" key={colocation.id}>
                      <div className="text-box">
                          <h2>{colocation.name}</h2>
                          <p className="para-16 description-coloc">{colocation.description}</p>
                      </div>
                      <div className="infos-box">
                          <p className="para-15 bold">Créé le: {colocation.created_at}</p>
                          <div className="icon-arrow box-shadow-1">
                              {/*<img src={iconArrow}/>*/}
                          </div>
                      </div>
                  </div>
              ))}
          </div>
          <div className="bloc-btn btn-icon btn-add-coloc">
              <button type="submit" >Ajouter une coloc</button>
          </div>
      </div>
  </div>
)
}

export default Coloc;
