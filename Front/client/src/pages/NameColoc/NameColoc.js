import React from 'react'

const NameColoc = () => {
    
    const options = [
        {
          label: "modifier",
          value: "update",
        },

        {
            label: "supprimer",
            value: "delete",
          },
    ];


    const items = [
        {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          },
          {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          },
          {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          },
          {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          },
          {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          },
          {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          },
          {
            "id": 1,
            "name": "titre depense",
            "pseudo": "bread",
            "price": "102$"
          }
      ];
  return (
    <div>
                 <h2 className="text-center">Nom Coloc</h2>
                 <div className = "row">
                    <button className="btn btn-primary">Ajouter une dépense</button>
                 </div>
                 <br></br>
                 <div className = "row">
                        <table className = "table table-striped table-bordered">
                            <tbody>
                            {items.map((item) =>
                                        <tr key={item.id}>
                                        <div>{item.name} </div>   
                                             <div>Payé par {item.pseudo} </div>   
                                             <div>{item.price}</div>
                                             <select>
            {options.map((option) => (
              <option value={option.value}>{option.label}</option>
            ))}
          </select>
                            
                                        </tr>
                                        )}
                            </tbody>
                        </table>

                 </div>

            </div>
  )
}

export default NameColoc