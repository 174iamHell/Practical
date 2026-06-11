<template>
    <div class="body">
        <header>
            <MobileLayoutHeader />
        </header>
        <main>
            <slot />
        </main>
        <footer>
            <MobileLayoutFooter />
        </footer>
        <MobileLayoutButtonBottom />
    </div>
</template>

<style>
@font-face {
    font-family: 'GT Eesti Pro Display';
    src: url('/fontStyle/gteestiprodisplay_regular.otf') format('opentype');
    font-weight: 400;
    font-style: normal;
}

@font-face {
    font-family: 'GT Eesti Pro Display';
    src: url('/fontStyle/gteestiprodisplay_bold.otf') format('opentype');
    font-weight: bold;
    font-style: normal;
}

body {
    min-height: 100vh;
    margin: 0;
    font-family: 'GT Eesti Pro Display';
}

.body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

main {
    flex-grow: 1;
}

footer {
    flex-shrink: 0;
    padding-top: 0;
}

.hover-red:hover {
    color: #e30016;
}

.hover-black:hover {
    color: black;
}
</style>