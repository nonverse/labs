import Logo from "../elements/Logo.jsx";
import {Outlet as ReactOutlet} from "react-router";
import Navigation from "./Navigation.jsx";
import {motion} from "framer-motion";
import {useSelector} from "react-redux";

const Outlet = () => {

    const settings = useSelector(state => (state.application.settings.value))

    return (
        <>
            <Logo fill={'#333344'}/>
            <Navigation/>
            <motion.div
                className="outlet"
                initial={{opacity: 0}}
                animate={{opacity: 1}}
                transition={{duration: .15}}
            >
                <ReactOutlet/>
            </motion.div>
        </>
    )
}

export default Outlet
