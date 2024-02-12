import ContentContainer from "../ContentContainer.jsx";
import CardLarge from "../../elements/CardLarge.jsx";
import games from "./games.json"
import bg from "../../../assets/images/minecraft-landscape.jpeg"
import {useNavigate} from "react-router";

const Gaming = () => {

    const navigate = useNavigate()

    return (
        <ContentContainer heading="Gaming" subHeading="Nonverse and community made gaming projects">
            <div id="games">
                {games.map(game => (
                    <CardLarge className="game-card" id={`game-${game.key}`} key={`game-${game.key}`} image={bg}
                               onClick={() => {
                                   navigate(`/gaming${game.location}`)
                               }}>
                        <h1>{game.title}</h1>
                        <h2>{game.description}</h2>
                    </CardLarge>
                ))}
            </div>
        </ContentContainer>
    )
}

export default Gaming
