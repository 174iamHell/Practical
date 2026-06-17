export default defineEventHandler((event) => {

    const query = getQuery(event);
    const searchText = (query.search || '').toString().toLowerCase().trim();

    if (searchText == '') {
        return { items: { categories: [], brands: [] } }
    }

    const categories =
    {
        "items": {
            "categories": [
                {
                    "name": "Асинхронные электродвигатели на 380 В",
                    "slug": "asinhronnye-elektrodvigateli-na-380-volt",
                    "image": "/files/c/016/459/small/asinhronnye-elektrodvigateli-na-380-volt.jpg",
                    "id": "16459",
                    "parent_category": "Электродвигатели"
                },
                {
                    "name": "Асинхронные электродвигатели на 220 В",
                    "slug": "asinhronnye-elektrodvigateli-na-220-volt",
                    "image": "/files/c/016/458/small/asinhronnye-elektrodvigateli-na-220-volt.jpg",
                    "id": "16458",
                    "parent_category": "Электродвигатели"
                },
                {
                    "name": "Насосы для топлива 220 В",
                    "slug": "nasosy-dlya-topliva-220-volt",
                    "image": "/files/c/001/763/small/nasosy-dlya-perekachki-topliva-220-volt.jpg",
                    "id": "1763",
                    "parent_category": "Насосы для топлива"
                },
                {
                    "name": "Шприцы для смазки в тубах",
                    "slug": "shpricy-dlya-smazki-v-tubah",
                    "image": "/files/c/001/844/small/shpric-dlya-smazki-v-tubah.jpg",
                    "id": "1844",
                    "parent_category": "Технические шприцы"
                }
            ],
            "brands": [
                {
                    "name": "Dungs",
                    "slug": "dungs",
                    "image": "/files/b/000/033/small/dungs.png",
                    "id": "33"
                },
                {
                    "name": "Danfoss",
                    "slug": "danfoss",
                    "image": "/files/b/000/216/small/danfoss.png",
                    "id": "216"
                }
            ]
        }
    }

    const filterCategories = categories.items.categories.filter((category) => {
        return category.name.toLowerCase().includes(searchText);
    })

    const filterBrands = categories.items.brands.filter((brand) => {
        return brand.name.toLowerCase().includes(searchText);
    })

    return {
        items: {
            categories: filterCategories,
            brands: filterBrands
        }
    }

})
