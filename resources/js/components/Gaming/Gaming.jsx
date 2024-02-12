import ContentContainer from "../ContentContainer.jsx";
import CardLarge from "../../elements/CardLarge.jsx";
import mcBg from "../../../assets/images/minecraft-landscape.jpeg"

const Gaming = () => {

    return (
        <ContentContainer heading="Gaming" subHeading="Nonverse and community made gaming projects">
            <div id="games">
                <CardLarge className="game-card" image={mcBg}>
                    <h1>Minecraft Server</h1>
                    <h2>The official Nonverse Minecraft server (Experiment)</h2>
                </CardLarge>
            </div>
        </ContentContainer>
    )
}

export default Gaming
