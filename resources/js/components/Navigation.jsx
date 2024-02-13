import {NavLink} from "react-router-dom";
import {useDispatch} from "react-redux";
import {renderModal} from "../state/app/modal.js";

const Navigation = () => {

    const dispatch = useDispatch()

    return (
        <nav id="navigation">
            <NavLink to="/" onClick={() => {dispatch((renderModal({id: ''})))}}>/</NavLink>
            <NavLink to="/about" onClick={() => {dispatch((renderModal({id: ''})))}}>About</NavLink>
            <NavLink to="/experiences" onClick={() => {dispatch((renderModal({id: ''})))}}>Experiences</NavLink>
            <NavLink to="/gaming" onClick={() => {dispatch((renderModal({id: ''})))}}>Gaming</NavLink>
            <NavLink to="https://github.com/nonverse" target="_blank" referrer={import.meta.env.VITE_APP_URL}>GitHub</NavLink>
        </nav>
    )
}

export default Navigation
