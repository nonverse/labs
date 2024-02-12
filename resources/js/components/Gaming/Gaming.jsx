import ContentContainer from "../ContentContainer.jsx";
import CardLarge from "../../elements/CardLarge.jsx";
import games from "./games.json"
import bg from "../../../assets/images/minecraft-landscape.jpeg"

const Gaming = () => {

    return (
        <ContentContainer heading="Gaming" subHeading="Nonverse and community made gaming projects">
            <div id="games">
                {games.map(game => (
                    <CardLarge className="game-card" key={`game-${game}`} image={bg}>
                        <h1>{game.title}</h1>
                        <h2>{game.description}</h2>
                    </CardLarge>
                ))}
            </div>
        </ContentContainer>
    )
}

export default Gaming
