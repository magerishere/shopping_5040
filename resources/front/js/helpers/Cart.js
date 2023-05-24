const Cart = () => {
    const getCartItemsRemoverButton = () => {
        return $("[data-cart-item-remover]");
    }

    const onClickRemoverButtonHandler = () => {
        getCartItemsRemoverButton().each(function () {
            const cartItemRemoverButton = $(this);
            cartItemRemoverButton.click(function () {
                const selector = cartItemRemoverButton.data('cart-item-remover');
                const qtyInput = $(selector);
                qtyInput.val(0);
                qtyInput.parents('form').submit();
            });
        });
    }

    return {
        init: () => {
            onClickRemoverButtonHandler();
        }
    }
}

export default Cart;
