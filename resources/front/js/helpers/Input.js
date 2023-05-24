const Input = () => {
    const getMinValueInputs = () => {
        return $('[data-min-value]');
    }


    const onBlurMinValueInputs = () => {
        getMinValueInputs().each(function () {
            const input = $(this);
            input.on('blur', function () {
                const minValue = input.data('min-value');
                const value = input.val().trim();
                if (Number(value) < Number(minValue)) {
                    input.val(minValue);
                }
            });
        });
    }

    return {
        init: () => {
            onBlurMinValueInputs();
        }
    }
}

export default Input;
