import ContentContainer from "../../ContentContainer.jsx";
import CardLarge from "../../../elements/CardLarge.jsx";
import image from "../../../../assets/images/minecraft-landscape.jpeg"
import Button from "../../../elements/Button.jsx";
import {useSelector} from "react-redux";
import InLineButton from "../../../elements/InLineButton.jsx";
import {useNavigate} from "react-router";
import auth from "../../../scripts/auth.js";
import helpers from "../../../scripts/helpers/helpers.js";

const Minecraft = () => {

    const user = useSelector(state => state.user.value)
    const navigate = useNavigate()

    return (
        <ContentContainer heading="Minecraft Server" subHeading="The official Nonverse Minecraft server (Experiment)">
            <CardLarge className="game-card" image={image}/>
            <div className="game-description">
                <p>
                    The official Nonverse Minecraft server.
                    <br/>
                    For those with a thrill for survival or passion for creativity, the Nonverse Minecraft server brings
                    endless possibilities limited only by your imagination!
                    <br/><br/>
                    This server was created to test the limits of interoperability between the HTTP based Nonverse REST
                    API and application running on completely different technology stacks such as the Java Runtime
                    Environment.
                    <br/><br/>
                    Overtime the server has grown to support a number of creative methodologies enabled by controlling
                    in-game actions using a web application and vice-versa.
                    <br/><br/>
                    Feel free to explore the server, create your own worlds and even contribute to the source code of
                    the server and/or web application using our GitHub
                </p>
            </div>
            <div id="game-actions">
                <Button id="minecraft-cta" onClick={() => {
                    if (user) {
                        //
                    } else {
                        window.location = `${import.meta.env.VITE_AUTH_SERVER}?${helpers.getRedirectQuery()}`
                    }
                }}>{user ? 'Get Started' : 'Login to get started'}</Button>
                <InLineButton id="game-back" onClick={() => {
                    navigate('/gaming')
                }}>Back</InLineButton>
            </div>
        </ContentContainer>
    )
}

export default Minecraft
