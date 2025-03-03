"use strict";(globalThis.webpackChunkgoogle_listings_and_ads=globalThis.webpackChunkgoogle_listings_and_ads||[]).push([[472],{4876:(e,t,n)=>{n.d(t,{NS:()=>u,RO:()=>g,Me:()=>m,Ay:()=>A});var o=n(1609),a=n(7723),l=n(6427),s=n(6087),c=n(9457),i=n(7892),r=n(7792),d=n(3658);const g="all-accounts",u="ads-account",m="api-data-fetch-feature",_={[g]:{title:(0,a.__)("Disconnect all accounts","google-listings-and-ads"),confirmButton:(0,a.__)("Disconnect all accounts","google-listings-and-ads"),confirmation:(0,a.__)("Yes, I want to disconnect all my accounts.","google-listings-and-ads"),contents:[(0,a.__)("I understand that I am disconnecting any WordPress.com account, Google account, Google Merchant Center account and Google Ads account connected to this extension.","google-listings-and-ads"),(0,a.__)("Any active product listings will continue to show on Google. They can be managed, edited, or deleted manually from Google Merchant Center (merchants.google.com).","google-listings-and-ads"),(0,a.__)("Any ongoing campaigns will continue to run. They can be managed, edited, or deleted manually from Google Ads (ads.google.com).","google-listings-and-ads")]},[u]:{title:(0,a.__)("Disconnect Google Ads account","google-listings-and-ads"),confirmButton:(0,a.__)("Disconnect Google Ads Account","google-listings-and-ads"),confirmation:(0,a.__)("Yes, I want to disconnect my Google Ads account.","google-listings-and-ads"),contents:[(0,a.__)("I understand that I am disconnecting my Google Ads account from this WooCommerce extension.","google-listings-and-ads"),(0,a.__)("Any ongoing campaigns will continue to run. They can be managed, edited, or deleted manually from Google Ads (ads.google.com).","google-listings-and-ads"),(0,a.__)("Some configurations for Google Ads created through WooCommerce may be lost. This cannot be undone.","google-listings-and-ads")]},[m]:{title:(0,a.__)("Disable data fetching","google-listings-and-ads"),confirmButton:(0,a.__)("Disable data fetching","google-listings-and-ads"),confirmation:(0,a.__)("Yes, I want to disable the data fetching feature.","google-listings-and-ads"),contents:[(0,a.__)("I understand that I am disabling the data fetching feature from this WooCommerce extension.","google-listings-and-ads"),(0,a.__)("Any ongoing campaigns and configuration will continue to run. They will be pushed to Google as in the previous versions of this extension.","google-listings-and-ads")]}};function h({disconnectTarget:e,onRequestClose:t,onDisconnected:n,disconnectAction:u}){const[m,h]=(0,s.useState)(!1),[A,E]=(0,s.useState)(!1),y=(0,d.j)(),{title:f,confirmButton:p,confirmation:b,contents:C}=_[e],x=()=>{A||t()};return(0,o.createElement)(c.A,{className:"gla-disconnect-accounts-modal",title:(0,o.createElement)(o.Fragment,null,(0,o.createElement)(r.A,{size:20}),f),isDismissible:!A,buttons:[(0,o.createElement)(i.A,{key:"1",isSecondary:!0,disabled:A,onClick:x},(0,a.__)("Never mind","google-listings-and-ads")),(0,o.createElement)(i.A,{key:"2",isPrimary:!0,isDestructive:!0,loading:A,disabled:!m,onClick:()=>{let o=e===g?y.disconnectAllAccounts:y.disconnectGoogleAdsAccount;u&&(o=u),E(!0),o().then((()=>{n(),t()})).catch((()=>{E(!1)}))}},p)],onRequestClose:x},C.map(((e,t)=>(0,o.createElement)("p",{key:t},e))),(0,o.createElement)(l.CheckboxControl,{label:b,checked:m,disabled:A,onChange:h}))}function A(e){return(0,o.createElement)(h,{...e})}},2625:(e,t,n)=>{n.r(t),n.d(t,{default:()=>re});var o=n(1609),a=n(6087),l=n(6476),s=n(3905),c=n(14),i=n(8e3),r=n(1016),d=n(3666),g=n(3354),u=n(7723),m=n(6427),_=n(8242),h=n(3741),A=n(7892),E=n(6960),y=n(8864),f=n(8683),p=n(1177),b=n(850);const C=({children:e})=>{const{getInputProps:t,adapter:{isSubmitting:n}}=(0,E.h5)();return(0,o.createElement)(_.A,{title:(0,u.__)("Tax rate (required for U.S. only)","google-listings-and-ads"),description:(0,o.createElement)("div",null,(0,o.createElement)("p",null,(0,u.__)("This tax rate will be shown to potential customers, together with the cost of your product.","google-listings-and-ads")),(0,o.createElement)("p",null,(0,o.createElement)(p.A,{context:"setup-mc-tax-rate",linkId:"tax-rate-read-more",href:"https://support.google.com/merchants/answer/160162"},(0,u.__)("Read more","google-listings-and-ads"))))},(0,o.createElement)(_.A.Card,null,(0,o.createElement)(_.A.Card.Body,null,(0,o.createElement)(b.A,{size:"large"},(0,o.createElement)(f.A,{...t("tax_rate"),label:(0,u.__)("My store uses destination-based tax rates.","google-listings-and-ads"),value:"destination",collapsible:!0,disabled:n},(0,o.createElement)(y.A,null,(0,u.__)("Google’s estimated tax rates will automatically be applied to my product listings.","google-listings-and-ads"))),(0,o.createElement)(f.A,{...t("tax_rate"),label:(0,u.__)("My store does not use destination-based tax rates.","google-listings-and-ads"),value:"manual",collapsible:!0,disabled:n},(0,o.createElement)(y.A,null,(0,a.createInterpolateElement)((0,u.__)("I’ll set my tax rates up manually in <link>Google Merchant Center</link>. I understand that if I don’t set this up, my products will be disapproved.","google-listings-and-ads"),{link:(0,o.createElement)(p.A,{context:"setup-mc-tax-rate",linkId:"tax-rate-manual",href:"https://www.google.com/retail/solutions/merchant-center/"})})))))),e)};var x=n(873),v=n(7337);var w=n(5847),G=n(5640),k=n(8998);const S=new Set(["destination","manual"]);function D(){const{settings:e,saveSettings:t,syncSettings:n}=(0,x.A)(),{data:a}=(0,w.A)(),l=((e=null)=>{const{code:t}=(0,v.A)();return"US"===t||!(!e||!e.includes("US"))||(!t||null===e)&&null})(a),{createNotice:s}=(0,G.A)();return l&&e?.hasOwnProperty("tax_rate")?(0,o.createElement)(E.Ay,{initialValues:{tax_rate:e.tax_rate},validate:e=>{const t={};return S.has(e.tax_rate)||(t.tax_rate=(0,u.__)("Please specify tax rate option.","google-listings-and-ads")),t},onSubmit:async o=>{const a={...e,tax_rate:o.tax_rate};return t(a).then(n,(e=>{(0,k.h)(e,(0,u.__)("There was an error saving tax rate.","google-listings-and-ads"))})).catch((e=>{(0,k.h)(e,(0,u.__)("There was an error synchronizing tax rate to Google Merchant Center.","google-listings-and-ads"))})).then((()=>{s("success",(0,u.__)("Your change to tax rate has been saved and will be synced to your Google Merchant Center.","google-listings-and-ads"))}))}},(t=>{const{values:n,isValidForm:a}=t,l=n.tax_rate,s=!a||l===e.tax_rate;return(0,o.createElement)(C,null,(0,o.createElement)(m.Flex,{justify:"flex-end"},(0,o.createElement)(A.A,{isPrimary:!0,disabled:s,loading:t.adapter.isSubmitting,onClick:t.handleSubmit},(0,u.__)("Save tax rate","google-listings-and-ads"))))})):!1===l?null:(0,o.createElement)(_.A,null,(0,o.createElement)(h.A,null))}var I=n(1968),T=n(7401),N=n(7916),M=n(1378),P=n(6028),F=n(4790),O=n(8678),W=n(458),j=n(1666);function R(e){return(0,o.createElement)(_.A,{title:(0,u.__)("Linked accounts","google-listings-and-ads"),description:(0,u.__)("A WordPress.com account, Google account, Google Merchant Center account, and Google Ads account are required to use this extension in WooCommerce.","google-listings-and-ads"),...e})}var q=n(4876),B=n(6473);const{CONNECTED:z,INCOMPLETE:L}=s.Wn;function H(){const e=(0,I.A)(),{jetpack:t}=(0,T.A)(),{google:n}=(0,i.A)(),{googleMCAccount:l}=(0,N.A)(),{googleAdsAccount:s}=(0,M.A)(),c=!(t&&n&&l&&s),r=[z,L].includes(s?.status),[g,h]=(0,a.useState)(null);return(0,o.createElement)(R,null,g&&(0,o.createElement)(q.Ay,{onRequestClose:()=>h(null),onDisconnected:()=>{(0,B.Ff)("gla_disconnected_accounts",{context:g});const t=g===q.RO?e+(0,d.XG)():window.location.href;window.location.href=t},disconnectTarget:g}),c?(0,o.createElement)(P.A,null):(0,o.createElement)(o.Fragment,null,(0,o.createElement)(F.LJ,{jetpack:t}),(0,o.createElement)(O.Az,{googleAccount:n,hideAccountSwitch:!0}),(0,o.createElement)(j.D,{googleMCAccount:l}),r&&(0,o.createElement)(W.Ez,{googleAdsAccount:s,hideAccountSwitch:!0},(0,o.createElement)(_.A.Card.Footer,null,(0,o.createElement)(A.A,{isDestructive:!0,isLink:!0,onClick:()=>h(q.NS)},(0,u.__)("Disconnect Google Ads account only","google-listings-and-ads")))),(0,o.createElement)(m.Flex,{justify:"flex-end"},(0,o.createElement)(A.A,{isPrimary:!0,isDestructive:!0,onClick:()=>h(q.RO)},(0,u.__)("Disconnect from all accounts","google-listings-and-ads")))))}var Y=n(7677),K=n(1903),$=n(559);function U(){const{jetpack:e}=(0,T.A)(),t="yes"===e?.active;return(0,a.useEffect)((()=>{t&&(0,l.getHistory)().replace((0,d.FN)())}),[t]),e?(0,o.createElement)(R,null,(0,o.createElement)($.A,{className:"gla-wpcom-connection-lost-card",isBorderless:!0,size:"small",icon:(0,o.createElement)(Y.A,{icon:K.A,size:24}),title:(0,u.__)("Your WordPress.com account has been disconnected.","google-listings-and-ads"),helper:(0,u.__)("Connect your WordPress.com account to ensure your products stay listed on Google. If you do not re-connect, your products can’t be automatically synced to Google, and any existing listings may be removed from Google.","google-listings-and-ads")}),(0,o.createElement)(F.s9,null)):(0,o.createElement)(h.A,null)}var V=n(7400),J=n(9415),Q=n(3658);function X({email:e}){const t=(0,I.A)(),[n,s]=(0,a.useState)(null),{disconnectGoogleAccount:c}=(0,Q.j)(),[i,r]=(0,a.useState)(!1);return(0,o.createElement)($.A,{appearance:$.x.GOOGLE,description:e},(0,o.createElement)(m.CardDivider,null),(0,o.createElement)(_.A.Card.Body,null,(0,o.createElement)(m.Notice,{status:"error",isDismissible:!1},(0,o.createElement)("p",null,(0,a.createInterpolateElement)((0,u.__)("This Google account, <accountEmail />, was not the Google account previously connected to this integration.","google-listings-and-ads"),{accountEmail:(0,o.createElement)("strong",null,e)})),(0,o.createElement)("p",null,(0,u.__)("Thus, it doesn‘t have access to the Google Merchant Center and/or Google Ads account currently connected to this WooCommerce store.","google-listings-and-ads")),(0,o.createElement)("p",null,(0,u.__)("Try connecting with a different Google account, or completely disconnect all your connected accounts.","google-listings-and-ads")))),(0,o.createElement)(_.A.Card.Footer,{justify:"flex-end"},n&&(0,o.createElement)(q.Ay,{onRequestClose:()=>s(null),onDisconnected:()=>{const e=(0,l.getNewPath)(null,"/google/start",null);window.location.href=t+e},disconnectTarget:n}),(0,o.createElement)(A.A,{isSecondary:!0,isDestructive:!0,disabled:i,onClick:()=>s(q.RO)},(0,u.__)("Disconnect all accounts","google-listings-and-ads")),(0,o.createElement)(A.A,{isPrimary:!0,loading:i,onClick:()=>{r(!0),c().catch((()=>{r(!1)}))}},(0,u.__)("Try another Google account","google-listings-and-ads"))))}function Z(){const{data:e}=(0,J.A)("getGoogleAccountAccess"),t=(0,V.A)(s.Th.adsSetupComplete,e?.scope),n="yes"===e?.active,c=n?"no"===e?.merchant_access||"no"===e?.ads_access:void 0,i=n&&!c&&t.glaRequired;if((0,a.useEffect)((()=>{i&&(0,l.getHistory)().replace((0,d.uZ)())}),[i]),!e)return(0,o.createElement)(h.A,null);if(!i){const t=c?(0,o.createElement)(X,{email:e.email}):(0,o.createElement)(O.Ay,null);return(0,o.createElement)(_.A,{title:(0,u.__)("Connect account","google-listings-and-ads")},t)}return null}var ee=n(6474),te=n(5595),ne=n(7539),oe=n(2455);const ae=()=>{(0,ee.A)("full-content");const{updateGoogleMCContactInformation:e}=(0,Q.j)(),{data:t}=(0,te.A)(),[n,s]=(0,a.useState)(!1),c=t.isAddressFilled&&t.isMCAddressDifferent;return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(ne.A,{title:(0,u.__)("Edit store address","google-listings-and-ads"),helpButton:(0,o.createElement)(oe.A,{eventContext:"edit-store-address"}),backHref:(0,d.FN)()}),(0,o.createElement)("div",{className:"gla-settings"},(0,o.createElement)(_.A,{title:(0,u.__)("Store address","google-listings-and-ads"),description:(0,o.createElement)("div",null,(0,o.createElement)("p",null,(0,u.__)("Your store address is required by Google for verification purposes. It will be shared with the Google Merchant Center and will not be displayed to customers.","google-listings-and-ads")),(0,o.createElement)("p",null,(0,o.createElement)(p.A,{context:"settings-store-address",linkId:"contact-information-read-more",href:"https://woocommerce.com/document/google-for-woocommerce/get-started/requirements/#contact-information"},(0,u.__)("Learn more","google-listings-and-ads"))))},(0,o.createElement)(g.S,null)),(0,o.createElement)(_.A,null,(0,o.createElement)(m.Flex,{justify:"flex-end"},(0,o.createElement)(A.A,{isPrimary:!0,loading:n,disabled:!c,eventName:"gla_contact_information_save_button_click",onClick:()=>{s(!0),e().then((()=>(0,l.getHistory)().push((0,d.FN)()))).catch((()=>s(!1)))}},(0,u.__)("Save details","google-listings-and-ads"))))))};var le=n(332),se=n(9927),ce=n(5246);const ie="gla-settings",re=()=>{const{subpath:e}=(0,l.getQuery)();(0,c.A)(),(0,r.A)();const{google:t}=(0,i.A)(),n=e===d.$K.reconnectGoogleAccount;switch((0,a.useEffect)((()=>{n||"no"!==t?.active||(0,l.getHistory)().replace((0,d.Ke)(s.iH.GOOGLE_DISCONNECTED))}),[n,t]),e){case d.$K.reconnectWPComAccount:return(0,o.createElement)("div",{className:ie},(0,o.createElement)(U,null));case d.$K.reconnectGoogleAccount:return(0,o.createElement)(Z,null);case d.$K.editStoreAddress:return(0,o.createElement)(ae,null)}return(0,o.createElement)("div",{className:ie},(0,o.createElement)(le.A,null),(0,o.createElement)(se.A,null),(0,o.createElement)(ce.A,null),(0,o.createElement)(g.h,null),(0,o.createElement)(D,null),(0,o.createElement)(H,null))}}}]);