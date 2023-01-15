import axios from 'axios';
import React, { useEffect, useState } from 'react'
import '../assets/css/modales/modale-participants.css';


const ModalParticipants = () => {
    const [userInfo, setUserInfo] = useState([]);
    const [totalUsers, setTotalUsers] = useState(0);

    useEffect(() => {
        axios.get('http://localhost:1501/mes_colocs/1/charge')
        .then(response => {
            const userInfo = Object.values(response.data.InfoColoc.user_info);
            setUserInfo(userInfo);
            setTotalUsers(userInfo.length);
        });
    }, []);

   

    return (

        <div className='vh-100 modale modale-depense flex-center'>
            <div className="box-shadow-modale box-model modale-depense-container">
                <div className="box-model-scroll">
                    <h1 className="text-center">Les participants</h1>
                    <p className="satoshi-bold category-depense para-15">{totalUsers} participants</p>
                    <div className="depense-bloc">
                        <div className="depense-participants box-model box-shadow-1">
                        <ul>{userInfo.map(user => <li key={user.user_id}>{user.user_username}</li>)}
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
};

export default ModalParticipants