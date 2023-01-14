import React, {useContext, useEffect, useState} from 'react';
import './NavBar.css';
import {Link} from "react-router-dom";
import { useLocation } from 'react-router-dom';


export default function NavBar() {
    const location = useLocation();
    const [isHome,setIsHome] = useState(true);

    useEffect(() =>{
        if(location.pathname == "/"){
            setIsHome(true)
        }else{
            setIsHome(false)
        }
    },[isHome]);

    if(location.pathname == "/login" || location.pathname == "/register"){

        return null;
    }else{

    return (

        <header className="header">
            <a className="logo"><Link to="/Home">coloCount</Link></a>
            <ul className="menu">
                {isHome ?
                    "":<li><Link to="/Login">Mes Colocs</Link></li>
                }
                <li><Link to="/Login">Mon Compte</Link></li>

            </ul>
            <pre>

    </pre>
        </header>
    )
    //}
    }
}
