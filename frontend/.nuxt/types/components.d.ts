
import type { DefineComponent, SlotsType } from 'vue'
type IslandComponent<T> = DefineComponent<{}, {refresh: () => Promise<void>}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, SlotsType<{ fallback: { error: unknown } }>> & T

type HydrationStrategies = {
  hydrateOnVisible?: IntersectionObserverInit | true
  hydrateOnIdle?: number | true
  hydrateOnInteraction?: keyof HTMLElementEventMap | Array<keyof HTMLElementEventMap> | true
  hydrateOnMediaQuery?: string
  hydrateAfter?: number
  hydrateWhen?: boolean
  hydrateNever?: true
}
type LazyComponent<T> = DefineComponent<HydrationStrategies, {}, {}, {}, {}, {}, {}, { hydrated: () => void }> & T

interface _GlobalComponents {
  LayoutFooter: typeof import("../../app/components/Layout/Footer.vue")['default']
  LayoutHeader: typeof import("../../app/components/Layout/Header.vue")['default']
  LayoutMain: typeof import("../../app/components/Layout/Main.vue")['default']
  MainLayoutFirstLayout: typeof import("../../app/components/MainLayout/FirstLayout.vue")['default']
  MainLayoutSecondLayout: typeof import("../../app/components/MainLayout/SecondLayout.vue")['default']
  MobileLayoutButtonBottom: typeof import("../../app/components/MobileLayout/ButtonBottom.vue")['default']
  MobileLayoutCities: typeof import("../../app/components/MobileLayout/Cities/Cities.vue")['default']
  MobileLayoutCitiesSearchCity: typeof import("../../app/components/MobileLayout/Cities/SearchCity.vue")['default']
  MobileLayoutContactHeader: typeof import("../../app/components/MobileLayout/ContactHeader.vue")['default']
  MobileLayoutFooter: typeof import("../../app/components/MobileLayout/Footer.vue")['default']
  MobileLayoutHeader: typeof import("../../app/components/MobileLayout/Header.vue")['default']
  MobileLayoutInputHeader: typeof import("../../app/components/MobileLayout/InputHeader.vue")['default']
  PopapAssent: typeof import("../../app/components/Popap/Assent.vue")['default']
  PopapBase: typeof import("../../app/components/Popap/Base.vue")['default']
  PopapModal: typeof import("../../app/components/Popap/Modal.vue")['default']
  ProductsCategories: typeof import("../../app/components/Products/Categories.vue")['default']
  ProductsItem: typeof import("../../app/components/Products/Item.vue")['default']
  ProductsList: typeof import("../../app/components/Products/List.vue")['default']
  ProductsSearchProducts: typeof import("../../app/components/Products/Search/Products.vue")['default']
  ProductsSearchPromt: typeof import("../../app/components/Products/Search/Promt.vue")['default']
  ProductsSearchTextHighlight: typeof import("../../app/components/Products/Search/TextHighlight.vue")['default']
  NuxtWelcome: typeof import("../../node_modules/nuxt/dist/app/components/welcome.vue")['default']
  NuxtLayout: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-layout")['default']
  NuxtErrorBoundary: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-error-boundary.vue")['default']
  ClientOnly: typeof import("../../node_modules/nuxt/dist/app/components/client-only")['default']
  DevOnly: typeof import("../../node_modules/nuxt/dist/app/components/dev-only")['default']
  ServerPlaceholder: typeof import("../../node_modules/nuxt/dist/app/components/server-placeholder")['default']
  NuxtLink: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-link")['default']
  NuxtLoadingIndicator: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-loading-indicator")['default']
  NuxtTime: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-time.vue")['default']
  NuxtRouteAnnouncer: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-route-announcer")['default']
  NuxtAnnouncer: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-announcer")['default']
  NuxtImg: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-stubs")['NuxtImg']
  NuxtPicture: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-stubs")['NuxtPicture']
  NuxtPage: typeof import("../../node_modules/nuxt/dist/pages/runtime/page")['default']
  NoScript: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['NoScript']
  Link: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Link']
  Base: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Base']
  Title: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Title']
  Meta: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Meta']
  Style: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Style']
  Head: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Head']
  Html: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Html']
  Body: typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Body']
  NuxtIsland: typeof import("../../node_modules/nuxt/dist/app/components/nuxt-island")['default']
  LazyLayoutFooter: LazyComponent<typeof import("../../app/components/Layout/Footer.vue")['default']>
  LazyLayoutHeader: LazyComponent<typeof import("../../app/components/Layout/Header.vue")['default']>
  LazyLayoutMain: LazyComponent<typeof import("../../app/components/Layout/Main.vue")['default']>
  LazyMainLayoutFirstLayout: LazyComponent<typeof import("../../app/components/MainLayout/FirstLayout.vue")['default']>
  LazyMainLayoutSecondLayout: LazyComponent<typeof import("../../app/components/MainLayout/SecondLayout.vue")['default']>
  LazyMobileLayoutButtonBottom: LazyComponent<typeof import("../../app/components/MobileLayout/ButtonBottom.vue")['default']>
  LazyMobileLayoutCities: LazyComponent<typeof import("../../app/components/MobileLayout/Cities/Cities.vue")['default']>
  LazyMobileLayoutCitiesSearchCity: LazyComponent<typeof import("../../app/components/MobileLayout/Cities/SearchCity.vue")['default']>
  LazyMobileLayoutContactHeader: LazyComponent<typeof import("../../app/components/MobileLayout/ContactHeader.vue")['default']>
  LazyMobileLayoutFooter: LazyComponent<typeof import("../../app/components/MobileLayout/Footer.vue")['default']>
  LazyMobileLayoutHeader: LazyComponent<typeof import("../../app/components/MobileLayout/Header.vue")['default']>
  LazyMobileLayoutInputHeader: LazyComponent<typeof import("../../app/components/MobileLayout/InputHeader.vue")['default']>
  LazyPopapAssent: LazyComponent<typeof import("../../app/components/Popap/Assent.vue")['default']>
  LazyPopapBase: LazyComponent<typeof import("../../app/components/Popap/Base.vue")['default']>
  LazyPopapModal: LazyComponent<typeof import("../../app/components/Popap/Modal.vue")['default']>
  LazyProductsCategories: LazyComponent<typeof import("../../app/components/Products/Categories.vue")['default']>
  LazyProductsItem: LazyComponent<typeof import("../../app/components/Products/Item.vue")['default']>
  LazyProductsList: LazyComponent<typeof import("../../app/components/Products/List.vue")['default']>
  LazyProductsSearchProducts: LazyComponent<typeof import("../../app/components/Products/Search/Products.vue")['default']>
  LazyProductsSearchPromt: LazyComponent<typeof import("../../app/components/Products/Search/Promt.vue")['default']>
  LazyProductsSearchTextHighlight: LazyComponent<typeof import("../../app/components/Products/Search/TextHighlight.vue")['default']>
  LazyNuxtWelcome: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/welcome.vue")['default']>
  LazyNuxtLayout: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-layout")['default']>
  LazyNuxtErrorBoundary: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-error-boundary.vue")['default']>
  LazyClientOnly: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/client-only")['default']>
  LazyDevOnly: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/dev-only")['default']>
  LazyServerPlaceholder: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/server-placeholder")['default']>
  LazyNuxtLink: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-link")['default']>
  LazyNuxtLoadingIndicator: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-loading-indicator")['default']>
  LazyNuxtTime: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-time.vue")['default']>
  LazyNuxtRouteAnnouncer: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-route-announcer")['default']>
  LazyNuxtAnnouncer: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-announcer")['default']>
  LazyNuxtImg: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-stubs")['NuxtImg']>
  LazyNuxtPicture: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-stubs")['NuxtPicture']>
  LazyNuxtPage: LazyComponent<typeof import("../../node_modules/nuxt/dist/pages/runtime/page")['default']>
  LazyNoScript: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['NoScript']>
  LazyLink: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Link']>
  LazyBase: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Base']>
  LazyTitle: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Title']>
  LazyMeta: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Meta']>
  LazyStyle: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Style']>
  LazyHead: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Head']>
  LazyHtml: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Html']>
  LazyBody: LazyComponent<typeof import("../../node_modules/nuxt/dist/head/runtime/components")['Body']>
  LazyNuxtIsland: LazyComponent<typeof import("../../node_modules/nuxt/dist/app/components/nuxt-island")['default']>
}

declare module 'vue' {
  export interface GlobalComponents extends _GlobalComponents { }
}

export {}
