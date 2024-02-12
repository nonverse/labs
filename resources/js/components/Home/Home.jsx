import {useSelector} from "react-redux";
import {useState} from "react";
import Hero from "./Hero.jsx";
import HomeNavigation from "./HomeNavigation.jsx";
import Logo from "../../elements/Logo.jsx";
import {motion} from "framer-motion";

const Home = () => {

    const user = useSelector(state => state.user.value)
    const [show, setShow] = useState({
        security: true
    })

    return (
        <motion.div
            key="home"
            initial={{opacity: 0}}
            animate={{opacity: 1}}
            exit={{opacity: 0}}
            transition={{duration: .15}}
        >
            <Logo fill='#ECF0F3'/>
            <div id="home">
                <Hero/>
                <HomeNavigation/>
            </div>
        </motion.div>
    )
}

export default Home
