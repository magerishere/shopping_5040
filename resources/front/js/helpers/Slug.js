const Slug = () => {
    const getSluggables = () => {
        return $("[data-slugger-selector]");
    }

    const getSluggers = () => {
        return getSluggables().map(function () {
            const selector = $(this).data('slugger-selector');
            return $(selector);
        });
    }

    const onChangeSluggables = () => {
        getSluggers().each(function (index) {
            const slugger = $(this);
            if (slugger.length === 0) {
                console.warn(`Slugger Not Found: ${slugger}`)
                return;
            }
            const sluggable = getSluggables().eq(index);
            slugger.on('blur', async function () {
                const sluggerValue = slugger.val().trim();
                if (!sluggerValue) {
                    sluggable.val('');
                    return;
                }
                const response = await Handler.Request().send({
                    url: sluggable.data('slugger-url'),
                    type: "POST",
                    data: {
                        value: slugger.val().trim(),
                    }
                });
                sluggable.val(response.content);
            });
        });
    }

    return {
        init: () => {
            onChangeSluggables();
        }
    }
}

export default Slug;
