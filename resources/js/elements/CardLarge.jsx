const CardLarge = ({className, id, image, onClick, children}) => {

    return (
        <div className={`card card-large ${className}`} id={id} style={{
            backgroundImage: image ? `url(${image})` : '',
            border: image ? '' : 'solid 1px rgba(var(--font-color-rgb), .5)'
        }} onClick={onClick}>
            {children}
        </div>
    )
}

export default CardLarge
