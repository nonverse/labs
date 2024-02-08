import {useSelector} from "react-redux";
import {useState} from "react";
import Hero from "./Hero.jsx";
import HomeNavigation from "./HomeNavigation.jsx";

const Home = () => {

    const user = useSelector(state => state.user.value)
    const [show, setShow] = useState({
        security: true
    })

    return (
        <div id="home">
            <Hero/>
            <HomeNavigation/>
        </div>
    )
}

export default Home
