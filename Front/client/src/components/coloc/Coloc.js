import React, { useEffect, useState } from 'react'

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
  <div className="post">
    {colocations.map(colocation => (
      <div key={colocation.id}>
        <h2>{colocation.name}</h2>
        <p>{colocation.description}</p>
        <p>Créé le: {colocation.created_at}</p>
        <button>mon button</button>
      </div>
    ))}
    <button>Ajouter une coloc</button>
  </div>
)
}

export default Coloc;
