
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
                    "image": "/files/p/000/962/item/kontur-m-m2r-10-01p-penogasitel-verhniy-sliv-962.jpg",
                    "id": "962"
                },
                {
                    "name": "Насос правого вращения Пензаспецавтомаш 1СВН-80А-П-У2",
                    "url": "nasosy-dlya-goryuche-smazochnyh-materialov/penzaspecavtomash-1svn-80a-p-u2-36133",
                    "image": "/files/p/036/133/item/penzaspecavtomash-1svn-80a-p-u2-36133-653577.jpg",
                    "id": "36133"
                },
                {
                    "name": "Насос для топлива СВН-80 П",
                    "url": "nasosy-dlya-goryuche-smazochnyh-materialov/svn-80-pravogo-vrashheniya-7129",
                    "image": "/files/p/007/129/item/svn-80-pravogo-vrashheniya-7129.jpg",
                    "id": "7129"
                },
                {
                    "name": "Мерник Контур-М М2Р-100-01П, пеногаситель (нержавеющий)",
                    "url": "merniki-dlya-azs/kontur-m-m2r-100-01p-penogasitel-nerzhaveyushhiy-995",
                    "image": "/files/p/000/995/item/kontur-m-m2r-100-01p-penogasitel-nerzhaveyushhiy-995.jpg",
                    "id": "995"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-32-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-32-3-p-2-32-3-34054",
                    "image": "/files/p/034/054/item/p-2-32-3-p-2-32-3-34054.jpg",
                    "id": "34054"
                },
                {
                    "name": "П-2-50-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-50-3-p-2-50-3-34056",
                    "image": "/files/p/034/056/item/p-2-50-3-p-2-50-3-34056.jpg",
                    "id": "34056"
                },
                {
                    "name": "П-2-50-5",
                    "url": "rukava-dlya-pishheproduktov/p-2-50-5-p-2-50-5-34068",
                    "image": "/files/p/034/068/item/p-2-50-5-p-2-50-5-34068.jpg",
                    "id": "34068"
                },
                {
                    "name": "П-2-50-10",
                    "url": "rukava-dlya-pishheproduktov/p-2-50-10-p-2-50-10-34080",
                    "image": "/files/p/034/080/item/p-2-50-10-p-2-50-10-34080.jpg",
                    "id": "34080"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-25-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-25-3-p-2-25-3-34053",
                    "image": "/files/p/034/053/item/p-2-25-3-p-2-25-3-34053.jpg",
                    "id": "34053"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-38-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-38-3-p-2-38-3-34055",
                    "image": "/files/p/034/055/item/p-2-38-3-p-2-38-3-34055.jpg",
                    "id": "34055"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-65-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-65-3-p-2-65-3-34057",
                    "image": "/files/p/034/057/item/p-2-65-3-p-2-65-3-34057.jpg",
                    "id": "34057"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-75-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-75-3-p-2-75-3-34058",
                    "image": "/files/p/034/058/item/p-2-75-3-p-2-75-3-34058.jpg",
                    "id": "34058"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-100-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-100-3-p-2-100-3-34059",
                    "image": "/files/p/034/059/item/p-2-100-3-p-2-100-3-34059.jpg",
                    "id": "34059"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-125-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-125-3-p-2-125-3-34060",
                    "image": "/files/p/034/060/item/p-2-125-3-p-2-125-3-34060.jpg",
                    "id": "34060"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-150-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-150-3-p-2-150-3-34061",
                    "image": "/files/p/034/061/item/p-2-150-3-p-2-150-3-34061.jpg",
                    "id": "34061"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-200-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-200-3-p-2-200-3-34062",
                    "image": "/files/p/034/062/item/p-2-200-3-p-2-200-3-34062.jpg",
                    "id": "34062"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-300-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-300-3-p-2-300-3-34063",
                    "image": "/files/p/034/063/item/p-2-300-3-p-2-300-3-34063.jpg",
                    "id": "34063"
                },
                {
                    "name": "Рукав для пищепродуктов П-2-250-3",
                    "url": "rukava-dlya-pishheproduktov/p-2-250-3-p-2-250-3-34064",
                    "image": "/files/p/034/064/item/p-2-250-3-p-2-250-3-34064.jpg",
                    "id": "34064"
                }
            ],
            "show_get_more": true

        }
    }

    const filterProducts = products.items.products.filter(product => {
        return product.name.toLowerCase().includes(searchText)
    })

    console.log(filterProducts)
    return {
        items: {
            products: filterProducts,
            show_get_more: (filterProducts || []).length > 0
        }
    }

})

