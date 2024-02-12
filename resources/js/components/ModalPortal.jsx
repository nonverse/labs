import {useSelector} from "react-redux";
import {AnimatePresence} from "framer-motion";
import MinecraftSetupModal from "./Gaming/Minecraft/MinecraftSetupModal.jsx";

const ModalPortal = () => {

    const modal = useSelector(state => state.application.modal.value)

    /**
     * All modals used in the application should be registered here
     * and rendered by dispatching the 'renderModal' reducer;
     *
     * eg. dispatch(renderModal(id: modalKey, data: {optionalModalData}))
     *
     * @type {{modal_key: JSX.Element}}
     */
    const modalArray = {
        'minecraft-setup': <MinecraftSetupModal/>,
    }

    return (
        <div className="modal-portal">
            <AnimatePresence mode="wait">
                {modal ? modalArray[modal.id] : ''}
            </AnimatePresence>
        </div>
    )
}

export default ModalPortal
