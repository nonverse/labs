import ScreenModal from "../../ScreenModal.jsx";
import {Formik} from "formik";
import Form from "../../../elements/Form.jsx";
import Field from "../../../elements/Field.jsx";
import validate from "../../../scripts/validate.js";
import {useState} from "react";
import MinecraftSetupUsername from "./MinecraftSetupUsername.jsx";

const MinecraftSetupModal = () => {

    const [state, setState] = useState(0)
    const views = {
        0: <MinecraftSetupUsername advance={advance}/>,
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
