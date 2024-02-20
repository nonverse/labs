import {Route, Routes, useLocation} from "react-router";
import {AnimatePresence} from "framer-motion";
import Home from "./Home/Home.jsx";
import Logo from "../elements/Logo.jsx";
import Outlet from "./Outlet.jsx";
import Gaming from "./Gaming/Gaming.jsx";
import Minecraft from "./Gaming/Minecraft/Minecraft.jsx";
import MinecraftOutlet from "./Gaming/Minecraft/MinecraftOutlet.jsx";

const Router = ({apiStatus}) => {

    const location = useLocation()

    return (
        <AnimatePresence mode="wait">
            <Routes location={location} key={location.pathname}>
                // Views
                <Route exact strict path={"/"} element={<Home/>}/>
                <Route path={"/"} element={<Outlet/>}>
                    <Route path={"/gaming"} element={<Gaming/>}/>

                    // Gaming
                    <Route path={"/gaming/minecraft"} element={<MinecraftOutlet/>}>
                        <Route path={"/gaming/minecraft"} element={<Minecraft apiStatus={apiStatus}/>}/>
                    </Route>

                    <Route path={"/*"} element={<span id="not-found">404 | Not Found</span>}/>
                </Route>
            </Routes>
        </AnimatePresence>
    )
}

export default Router
