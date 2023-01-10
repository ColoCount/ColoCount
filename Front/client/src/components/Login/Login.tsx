import React, { ChangeEvent, FormEvent, useState } from 'react'
import { Link, useNavigate } from 'react-router-dom'

export interface formDataInterface {
    username: string,
    password: string
}



const Login = () => {
    const [login, setLogin] = useState<formDataInterface>({password: "", username: ""})
    const navigate = useNavigate()

    const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
  
        fetch('/login', {
            method: "POST",
            mode: "cors",
            body: new URLSearchParams({
                ...login
            }),
            credentials: "include",
            headers: new Headers({
                "Authorization" : "Basic amZnbWFpbC5jb206cGFzc3dvcmQ=",
                "Content-type":  "application/x-www-form-urlencoded"
            })
        })
            .then(data => data.json())
            .then(json => {
                if (json.token) {
                    sessionStorage.setItem('token', JSON.stringify(json))
                    navigate("/")
                }
            })
        }
        
        const handleChange = (e: ChangeEvent) => {
            setLogin(prevState => {
                return {
                    ...prevState,
                    // @ts-ignore
                    [e.target.name]: e.target.value
                }
        })
    }

  return (
    <div>
        <section className='vh-100'>
            <div className='container-fluid h-custom' >
                <div className='row d-flex justify-content-center align-items-center h-100'>
                    <div className="col-md-9 col-lg-6 col-xl-5" >
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" className="img-fluid" alt="Sample image"/>
                    </div>
                    <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form onSubmit={handleSubmit}>
                            <div className="form-outline mb-4">
                                <input type="name" id="form3Example3" className="form-control form-control-lg" placeholder="username" onChange={handleChange}/>
                                <label className="form-label">username</label>
                            </div>
                            <div className="form-outline mb-4">
                                <input type="name" id="form3Example3" className="form-control form-control-lg" placeholder="password" onChange={handleChange}/>
                                <label className="form-label">Password</label>
                            </div>
                            <button type="submit" className="btn btn-primary btn-lg">Login</button>
                            <p className="small fw-bold mt-2 pt-1 mb-0">Don't have an account?</p><Link to={"/register"}></Link>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
  )
}

export default Login