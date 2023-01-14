import React, {useContext, useEffect, useState} from 'react';
import '../../assets/css/components/navbar-toggle.css';
import {Link} from "react-router-dom";
import iconParticipants from "../../assets/images/icons/icon-participants.svg"

export default function NavBarToggle() {
        return (
            <div className="navbar-toggle">
                <div className="menu-box box-shadow-1">
                    <ul className="menu">
                        <li><Link to="/depenses">Les dépenses</Link></li>
                        <li><Link to="/equilibre">L'équilibre</Link></li>
                    </ul>
                </div>
                <div className="icon-participants box-shadow-1">
                    <img src={iconParticipants}/>
                </div>
            </div>
        )
}
