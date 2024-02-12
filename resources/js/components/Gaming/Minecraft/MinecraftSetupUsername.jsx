import {Formik} from "formik";
import Form from "../../../elements/Form.jsx";
import Field from "../../../elements/Field.jsx";
import validate from "../../../scripts/validate.js";

const MinecraftSetupUsername = ({advance}) => {

    return (
        <Formik initialValues={{
            username: ''
        }} onSubmit={() => {

        }}>
            {({errors}) => (
                <Form id="screen-modal-form" cta="Continue">
                    <Field name="username" label="Minecraft username" validate={validate.require}
                           error={errors.username}/>
                    <p>
                        Your username will be checked with Mojang's servers, you MUST have a valid Minecraft license
                        to continue
                    </p>
                </Form>
            )}
        </Formik>
    )
}

export default MinecraftSetupUsername
