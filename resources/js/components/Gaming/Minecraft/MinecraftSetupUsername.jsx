import {Formik} from "formik";
import Form from "../../../elements/Form.jsx";
import Field from "../../../elements/Field.jsx";
import validate from "../../../scripts/validate.js";
import api from "../../../scripts/api.js";
import {useState} from "react";

const MinecraftSetupUsername = ({advance, setData}) => {

    const [error, setError] = useState('')

    return (
        <Formik initialValues={{
            username: ''
        }} onSubmit={async (values) => {
            await api.post('labs/minecraft/profile', values)
                .then(response => {
                    setData({
                        username: values.username
                    })
                    advance()
                })
                .catch(e => {
                    setError(e.response.data.errors ?? 'Something went wrong')
                })
        }}>
            {({errors, isSubmitting}) => (
                <Form loading={isSubmitting} id="screen-modal-form" cta="Continue">
                    <Field name="username" label="Minecraft username" validate={validate.require}
                           error={errors.username ? errors.username : error}/>
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
