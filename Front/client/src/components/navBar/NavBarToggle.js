import React, {useContext, useEffect, useState} from 'react';
import './NavBarToggle.css';
import {Link} from "react-router-dom";



export default function NavBarToggle() {


        return (

            <header className="toggle">
                <ul className="menu">

                    <li><Link to="/depenses">Les dépenses</Link></li>
                    <li><Link to="/equilibre">L'équilibre</Link></li>

                </ul>
                <pre>

    </pre>
            </header>
        )

}
