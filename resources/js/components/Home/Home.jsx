import {useSelector} from "react-redux";
import {useState} from "react";
import Hero from "./Hero.jsx";
import HomeNavigation from "./HomeNavigation.jsx";
import Logo from "../../elements/Logo.jsx";

const Home = () => {

    const user = useSelector(state => state.user.value)
    const [show, setShow] = useState({
        security: true
    })

    return (
        <>
            <Logo fill='#ECF0F3'/>
            <div id="home">
                <Hero/>
                <HomeNavigation/>
            </div>
        </>
    )
}

export default Home
