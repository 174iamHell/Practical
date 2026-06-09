
export default defineEventHandler((event) => {

    const query = getQuery(event)
    const searchText = (query.search || '').toString().toLowerCase().trim()

    const products =
    {
        "items": {
            "products": [
                {
                    "name": "Мерник М2Р-10-01П, пеногаситель, верхний слив",
                    "url": "merniki-dlya-azs/kontur-m-m2r-10-01p-penogasitel-verhniy-sliv-962",
                    "image": "https://unsplash.com",
                    "id": "962"
                },
                {
                    "name": "Насос правого вращения Пензаспецавтомаш 1СВН-80А-П-У2",
                    "url": "nasosy-dlya-goryuche-smazochnyh-materialov/penzaspecavtomash-1svn-80a-p-u2-36133",
                    "image": "https://unsplash.com",
                    "id": "36133"
                },
                {
                    "name": "Насос для топлива СВН-80 П",
                    "url": "nasosy-dlya-goryuche-smazochnyh-materialov/svn-80-pravogo-vrashheniya-7129",
                    "image": "https://unsplash.com",
                    "id": "7129"
                },
                {
                    "name": "Мерник Контур-М М2Р-100-01П, пеногаситель (нержавеющий)",
                    "url": "merniki-dlya-azs/kontur-m-m2r-100-01p-penogasitel-nerzhaveyushhiy-995",
                    "image": "https://unsplash.com",
                    "id": "995"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-32-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-32-3-p-2-32-3-34054",
                    "image": "https://unsplash.com",
                    "id": "34054"
                },
                {
                    "name": "П-2-50-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-50-3-p-2-50-3-34056",
                    "image": "https://unsplash.com",
                    "id": "34056"
                },
                {
                    "name": "П-2-50-5",
                    "url": "rukava-dlya-pishheproduktov/p-2-50-5-p-2-50-5-34068",
                    "image": "https://unsplash.com",
                    "id": "34068"
                },
                {
                    "name": "П-2-50-10",
                    "url": "rukava-dlya-pishheproduktov/p-2-50-10-p-2-50-10-34080",
                    "image": "https://unsplash.com",
                    "id": "34080"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-25-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-25-3-p-2-25-3-34053",
                    "image": "https://unsplash.com",
                    "id": "34053"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-38-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-38-3-p-2-38-3-34055",
                    "image": "https://unsplash.com",
                    "id": "34055"
                },
            ]
        }
    }


    const filterProducts = products.items.products.filter(product => {
        return product.name.toLowerCase().includes(searchText)
    })

    return {
        items: {
            products: filterProducts,
            show_get_more: (filterProducts || []).length > 0
        }
    }

})

