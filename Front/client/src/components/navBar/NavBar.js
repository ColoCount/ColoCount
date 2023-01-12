import React, { useContext, useState } from 'react';
import './NavBar.css';
export default function NavBar() {
    return (
        <header className="header">
            <a href="" className="logo">ColoCount</a>
            <label className="menu-icon" htmlFor="menu-btn"><span className="navicon"></span></label>
            <ul className="menu">
                <div className="menu-nav">
                <li><a href="#work">Les dépenses</a></li>
                <li><a href="#about">l'équilibre</a></li>
                </div>
                <div className="menu-compte">
                <li><a href="#careers">Careers</a></li>
                <li><a href="#contact">Contact</a></li>
                </div>
            </ul>
        </header>
    )
}
