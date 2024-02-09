import {Route, Routes, useLocation} from "react-router";
import {AnimatePresence} from "framer-motion";
import Home from "./Home/Home.jsx";
import Logo from "../elements/Logo.jsx";
import Outlet from "./Outlet.jsx";

const Router = () => {

    const location = useLocation()

    return (
        <AnimatePresence mode="wait">
            <Routes location={location} key={location.pathname}>
                // Views
                <Route exact strict path={"/"} element={<Home/>}/>
                <Route path={"/*"} element={<Outlet/>}/>
            </Routes>
        </AnimatePresence>
    )
}

export default Router
