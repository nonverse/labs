import {Formik} from "formik";
import Form from "../../../elements/Form.jsx";
import DigitInput from "../../../elements/DigitInput.jsx";
import validate from "../../../scripts/validate.js";
import InLineButton from "../../../elements/InLineButton.jsx";
import api from "../../../scripts/api.js";

const MinecraftSetupConfirm = ({data}) => {

    return (
        <Formik initialValues={{
            code: ''
        }} onSubmit={() => {

        }}>
            {({errors, setSubmitting, isSubmitting}) => (
                <div id="minecraft-setup-confirm">
                    <Form loading={isSubmitting} id="screen-modal-form" cta="Submit">
                        <p className="text-center">
                            Login to the Nonverse Minecraft server using the account with username {data.username}
                            <br/><br/>
                            Server Address: <span className="splash">mc.labs.nonverse.net</span>
                            <br/>
                            Server Port: <span className="splash">25565 (Default)</span>
                            <br/>
                            <br/>
                            When you have successfully logged in,
                            click <InLineButton onClick={async () => {
                            setSubmitting(true)
                            await api.post('labs/minecraft/profile/send-verification')
                                .then(response => {
                                    setSubmitting(false)
                                })
                        }}>here</InLineButton> to send
                            a one time code to your <br/> in-game chat and enter it below
                            <br/><br/>
                        </p>
                        <DigitInput name="code" validate={validate.require} error={errors.code} length={6}/>
                    </Form>
                </div>
            )}
        </Formik>
    )
}

export default MinecraftSetupConfirm
