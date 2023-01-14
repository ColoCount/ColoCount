import AuthReducer from "./AuthReducer";
import { createContext, useEffect, useReducer, useState } from "react";

export const AuthContext = createContext();



export const AuthContextProvider = ({ children }) => {
  const [currentUser, setCurrentUser] = useState(
    JSON.parse(localStorage.getItem("user")) || null
  );

// const INITIAL_STATE = {
//   user: JSON.parse(localStorage.getItem("user")) || null,
//   isFetching: false,
//   error: false,
// };
const login = async (inputs) => {
  // const res = await fetch("http://localhost:1501/login", {
  //   method: "POST",
  //   headers: {
  //       'Content-Type': 'application/x-www-form-urlencoded',
  //       'Authorization': `Bearer ${data.token}`
  //   },
  //   credentials: 'include',
  //   body: `username=${username}&password=${password}`
  // });

  // const data = await res.json();
  // setCurrentUser(data);
}



// export const AuthContextProvider = ({ children }) => {
//   const [state, dispatch] = useReducer(AuthReducer, INITIAL_STATE);

  useEffect(() => {
    localStorage.setItem("user", JSON.stringify(currentUser));
  }, [currentUser]);

  return (
    <AuthContext.Provider value={{ currentUser, login }}>
      {children}
    </AuthContext.Provider>
  );
};