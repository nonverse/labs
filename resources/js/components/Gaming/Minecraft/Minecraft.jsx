import MinecraftAbout from "./MinecraftAbout.jsx";
import {useEffect, useState} from "react";
import api from "../../../scripts/api.js";

const Minecraft = ({apiStatus}) => {

    const [profile, setProfile] = useState({})

    useEffect(() => {
        async function initialize() {
            await api.get('labs/minecraft/profile')
                .then(response => {
                    setProfile(response.data.data)
                })
        }

        initialize()
    }, []);

    return (
        <>
            {profile.verified_at ? <></> : <MinecraftAbout apiStatus={apiStatus}/>}
        </>
    )
}

export default Minecraft
