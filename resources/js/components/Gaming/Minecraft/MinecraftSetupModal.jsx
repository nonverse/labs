import ScreenModal from "../../ScreenModal.jsx";
import {useState} from "react";
import MinecraftSetupUsername from "./MinecraftSetupUsername.jsx";
import MinecraftSetupConfirm from "./MinecraftSetupConfirm.jsx";

const MinecraftSetupModal = () => {

    const [data, setData] = useState({})

    const [state, setState] = useState(0)
    const views = {
        0: <MinecraftSetupUsername advance={advance} setData={setData}/>,
        1: <MinecraftSetupConfirm data={data}/>
    }

    function advance() {
        setState(state + 1)
    }

    return (
        <ScreenModal id="minecraft-link-modal" heading="Minecraft Server" subHeading="Link your minecraft account">
            {views[state]}
        </ScreenModal>
    )
}

export default MinecraftSetupModal
