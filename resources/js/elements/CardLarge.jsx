const CardLarge = ({className, id, image, children}) => {

    return (
        <div className={`card card-large ${className}`} id={id} style={{
            backgroundImage: image ? `url(${image})` : '',
            border: image ? '' : 'solid 1px rgba(var(--font-color-rgb), .5)'
        }}>
            {children}
        </div>
    )
}

export default CardLarge
