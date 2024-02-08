import {NavLink} from "react-router-dom";

const HomeNavigation = () => {

    return (
        <nav id="home-navigation">
            <NavLink to="/about">About</NavLink>
            <NavLink to="/experiences">Experiences</NavLink>
            <NavLink to="/gaming">Gaming</NavLink>
            <NavLink to="https://github.com/nonverse" target="_blank" referrer={import.meta.env.VITE_APP_URL}>GitHub</NavLink>
        </nav>
    )
}

export default HomeNavigation
