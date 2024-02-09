import Logo from "../elements/Logo.jsx";
import {Outlet as ReactOutlet} from "react-router";
import Navigation from "./Navigation.jsx";

const Outlet = () => {

    return (
        <>
            <Logo fill={'#333344'}/>
            <Navigation/>
            <div className="outlet">
                <ReactOutlet/>
            </div>
        </>
    )
}

export default Outlet
