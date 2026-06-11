<template>
    <div class="block-button">
        <nav class="panel">
            <ul class="navigation-panel">
                <li class="list-navigation color-secont-link hover-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" viewBox="0 0 24 24" title="Главная">
                        <path fill="currentColor"
                            d="M6 19h3v-6h6v6h3v-9l-6-4.5L6 10zm-2 2V9l8-6l8 6v12h-7v-6h-2v6zm8-8.75"></path>
                    </svg>
                </li>
                <li class="list-navigation color-secont-link hover-red">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" title="Избранное" width="30px" height="30px"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3">
                        </path>
                    </svg>
                </li>
                <li class="list-navigation color-secont-link hover-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                        title="Заказы">
                        <path fill="currentColor"
                            d="M5 8v11h14V8h-3v8l-4-2l-4 2V8zm0 13q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25zM10 8v4.75l2-1l2 1V8zM5 8h14z">
                        </path>
                    </svg>
                </li>
                <li class="list-navigation color-secont-link hover-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                        title="Корзина">
                        <path fill="currentColor"
                            d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z">
                        </path>
                    </svg>
                </li>
                <li class="list-navigation color-main-link hover-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="32px" viewBox="0 0 24 24"
                        class="h-8 w-10">
                        <path fill="currentColor"
                            d="M9 14.25q-.525 0-.888-.363T7.75 13t.363-.888T9 11.75t.888.363t.362.887t-.363.888T9 14.25m6 0q-.525 0-.888-.363T13.75 13t.363-.888t.887-.362t.888.363t.362.887t-.363.888t-.887.362M12 20q3.35 0 5.675-2.325T20 12q0-.6-.075-1.162T19.65 9.75q-.525.125-1.05.188T17.5 10q-2.275 0-4.3-.975T9.75 6.3q-.8 1.95-2.287 3.388T4 11.85V12q0 3.35 2.325 5.675T12 20m0 2q-2.075 0-3.9-.787t-3.175-2.138T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22M10.65 4.125q1.05 1.75 2.85 2.813T17.5 8q.35 0 .675-.038t.675-.087Q17.8 6.125 16 5.063T12 4q-.35 0-.675.038t-.675.087m-6.225 5.35Q5.7 8.75 6.65 7.6t1.425-2.575Q6.8 5.75 5.85 6.9T4.425 9.475m3.65-4.45">
                        </path>
                    </svg>
                </li>
            </ul>
        </nav>
    </div>
</template>

<style scoped>
.block-button {
    display: flex;
    position: fixed;
    z-index: 999;
    top: 94%;
    width: 100%;
    background: white;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    padding: 8px;
}

.panel {
    display: flex;
    width: 100%;
}

.navigation-panel {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    margin: 0;
    gap: 20px;
    width: 100%;
    list-style: none;
    padding: 0;
}

.color-secont-link {
    color: #6a7282;
}

.color-main-link {
    color: black;
}
</style>