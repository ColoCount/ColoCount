import React, { FormEvent, useState } from 'react'
import { useNavigate } from 'react-router-dom'

export interface formDataInterface {
    username: string,
    email: string,
    passwordAgain: string,
    password: string
}

const Register = () => {
    const [register, setRegister] = useState<formDataInterface>({email:"",  password: "", username: "", passwordAgain:""})
    const navigate = useNavigate()
    const [err, setErr] = useState(null);

    const handleChange = (e: { target: { name: any; value: any } }) => {
        setRegister((prev) => ({ ...prev, [e.target.name]: e.target.value }));
      };
    
      const handleClick = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        fetch('/register', {
            method: "POST",
            mode: "cors",
            body: new URLSearchParams({
                ...register
            }),

        })
    }

  return (
    <div>
        <section className='vh-100'>
            <div className='container-fluid h-custom' >
                <div className='row d-flex justify-content-center align-items-center h-100'>
                    <div className="col-md-9 col-lg-6 col-xl-5" >
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        className="img-fluid" alt="Sample image"/>
                    </div>
                    <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="">
                            <div className="form-outline mb-4">
                                <input type="name" id="form3Example3" className="form-control form-control-lg" placeholder="username" />
                                <label className="form-label">username</label>
                            </div>
                            <div className="form-outline mb-4">
                                <input type="name" id="form3Example3" className="form-control form-control-lg" placeholder="e-mail" />
                                <label className="form-label">E-mail</label>
                            </div>
                            <div className="form-outline mb-4">
                                <input type="name" id="form3Example3" className="form-control form-control-lg" placeholder="password" />
                                <label className="form-label">Password</label>
                            </div>
                            <div className="form-outline mb-4">
                                <input type="name" id="form3Example3" className="form-control form-control-lg" placeholder="password-again" />
                                <label className="form-label">Password-again</label>
                            </div>
                            <button type="submit" className="btn btn-primary btn-lg">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
  )
}

export default Register