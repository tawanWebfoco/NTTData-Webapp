(()=>{var e={655:function(){var e="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\parent\\index.js";function l(){return l=Object.assign?Object.assign.bind():function(e){for(var l=1;l<arguments.length;l++){var t=arguments[l];for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(e[n]=t[n])}return e},l.apply(this,arguments)}const{__:t}=wp.i18n,{InnerBlocks:n,useBlockProps:r}=wp.blockEditor,{useSelect:o,dispatch:m}=wp.data,{Button:i,Placeholder:a}=wp.components,{useEffect:u}=wp.element,{registerBlockType:s}=wp.blocks;s("html5-player/parent",{title:t("HTML5 Video Player Form","h5vp"),icon:"format-video",category:"media",keywords:[t("HTML5 Video Player","h5vp"),t("Media Player","h5vp")],supports:{inserter:!1,reusable:!1,html:!1},edit:s=>{const c=r(),{clientId:p,isSelected:_}=s,d=o((e=>e("core/block-editor").getBlock(p).innerBlocks));u((()=>{_&&wp.data.dispatch("core/edit-post").openGeneralSidebar("edit-post/block")}),[_]),m("core/block-editor").setTemplateValidity(!0);const b=e=>{if("video"===e){const l=wp.blocks.createBlock(`html5-player/${e}`);return m("core/block-editor").insertBlock(l,0,p)}return!1},N=()=>0===d.length&&wp.element.createElement(n.ButtonBlockAppender,{__self:this,__source:{fileName:e,lineNumber:46,columnNumber:16}});return d?.length?wp.element.createElement("div",{__self:this,__source:{fileName:e,lineNumber:112,columnNumber:7}},wp.element.createElement("div",l({},c,{__self:this,__source:{fileName:e,lineNumber:113,columnNumber:9}}),wp.element.createElement(n,{templateLock:!1,renderAppender:()=>N(),__self:this,__source:{fileName:e,lineNumber:114,columnNumber:11}}))):wp.element.createElement("div",{__self:this,__source:{fileName:e,lineNumber:54,columnNumber:9}},wp.element.createElement("div",l({},c,{__self:this,__source:{fileName:e,lineNumber:55,columnNumber:11}}),wp.element.createElement(a,{icon:wp.element.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",className:"html5-block-icon",__self:this,__source:{fileName:e,lineNumber:58,columnNumber:17}},wp.element.createElement("polygon",{points:"23 7 16 12 23 17 23 7",__self:this,__source:{fileName:e,lineNumber:70,columnNumber:19}}),wp.element.createElement("rect",{x:"1",y:"5",width:"15",height:"14",rx:"2",ry:"2",__self:this,__source:{fileName:e,lineNumber:71,columnNumber:19}})),instructions:t("Choose a video type to get started.","h5vp"),label:t("Choose a Video Type","h5vp"),__self:this,__source:{fileName:e,lineNumber:56,columnNumber:13}},wp.element.createElement(i,{isPrimary:!0,onClick:()=>{b("video")},__self:this,__source:{fileName:e,lineNumber:77,columnNumber:15}},t("Video","h5vp")),wp.element.createElement(i,{isPrimary:!0,disabled:!0,onClick:()=>{b("youtube")},__self:this,__source:{fileName:e,lineNumber:85,columnNumber:15}},t("Youtube","h5vp")),wp.element.createElement(i,{isPrimary:!0,disabled:!0,onClick:()=>{b("vimeo")},__self:this,__source:{fileName:e,lineNumber:94,columnNumber:15}},t("Vimeo","h5vp")),wp.element.createElement("p",{style:{width:"100%",margin:"0 0",fontSize:"20px",color:"#e01414"},__self:this,__source:{fileName:e,lineNumber:103,columnNumber:13}},"Youtube and Vimeo is available on pro verion")),wp.element.createElement(n,{templateLock:!1,renderAppender:()=>!1,__self:this,__source:{fileName:e,lineNumber:105,columnNumber:13}})))},save:()=>{const t=r.save();return wp.element.createElement("div",l({},t,{__self:this,__source:{fileName:e,lineNumber:123,columnNumber:9}}),wp.element.createElement(n.Content,{__self:this,__source:{fileName:e,lineNumber:124,columnNumber:11}}))}})},423:(e,l,t)=>{"use strict";var n;t.d(l,{K:()=>r}),(n=jQuery)(document).ready((function(){const e=n(".h5vp_player_initializer");e&&r.initialize(e)})),n(window).on("elementor/frontend/init",(function(){elementorFrontend.hooks.addAction("frontend/element_ready/H5VPPlayer.default",(function(e,l){r.initialize(e)}))}));class r{static initialize(e){let l=arguments.length>1&&void 0!==arguments[1]&&arguments[1],t=arguments.length>2&&void 0!==arguments[2]&&arguments[2],n=window.innerWidth;const r=this.getDetectorData(e,l,t);if(!r)return!1;const{wrapper:o,mediaElement:m,options:i,infos:a}=r;n<768&&(i.controls=this.controlsForMobile(i?.controls));const u=new Plyr(m,i);if(i.muted&&i.autoplay&&(u.volume=0),u.elements.volume?.querySelector('[data-plyr="mute"]')?.addEventListener("click",(function(){0===u.volume&&(u.volume=.5)})),a?.setSource&&(u.source={type:"video",title:"Title",sources:[{src:a?.source,type:"video/mp4"}],poster:a?.poster}),window?.innerWidth<992&&(u.on("enterfullscreen",(e=>{screen?.orientation?.lock("landscape")})),u.on("exitfullscreen",(e=>{screen?.orientation?.lock("portrait")}))),u.on("enterfullscreen",(function(){o.classList.add("fullscreen")})),u.on("exitfullscreen",(function(){o.classList.remove("fullscreen")})),!i?.controls?.includes("progress")){const e=o.querySelector(".plyr__controls");e&&(e.style.background="transparent")}"undefined"!=typeof h5vp&&Boolean(parseInt(h5vp?.pauseOther))&&u.on("play",(()=>{if(location.pathname.includes("wp-admin"))return!1;const e=o.dataset?.uniqueId,l=document.querySelectorAll(`video:not([data-unique-id="${e}"] video, a video)`);Object.values(l).map((e=>e.pause()))}))}static getDetectorData(e,l,t){let n=null;if(null===e)return!1;if(void 0!==e[0])return e.map(((e,n)=>{this.initialize(n,l,t)})),!1;if(void 0!==e.length&&0===e.length)return!1;null!==e.querySelector(".h5vp_player")&&(e=e.querySelector(".h5vp_player"));let r=jQuery(e).attr("data-settings");return r&&(r=JSON.parse(r),e.dataset.settings="",l||(l=r?.options),t||(t=r?.infos)),n=e.querySelector("video"),{wrapper:e,options:l,mediaElement:n,infos:t}}static controlsForMobile(e){return e=this.removeControl(e,"restart"),e=this.removeControl(e,"duration"),e=this.removeControl(e,"airplay"),this.removeControl(e,"pip")}static removeControl(e,l){const t=e.indexOf(l);return-1!=t&&e.splice(t,1),e}static setHeight(e,l){const t=jQuery(e).width();l.on("loadeddata",(function(){const n=l.ratio;if(!n)return!1;const[r,o]=n.split(":"),m=t/r*o;e.classList.add("plyr_set_height"),jQuery(e).find(".plyr").css("height",m+"px")})),l.on("ready",(function(){setTimeout((()=>{e.querySelector(".plyr")?.removeAttribute("style")}),300)}))}}}},l={};function t(n){var r=l[n];if(void 0!==r)return r.exports;var o=l[n]={exports:{}};return e[n].call(o.exports,o,o.exports,t),o.exports}t.d=(e,l)=>{for(var n in l)t.o(l,n)&&!t.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:l[n]})},t.o=(e,l)=>Object.prototype.hasOwnProperty.call(e,l),(()=>{"use strict";t(655);var e=t(423),l="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\Video.js";const{Fragment:n}=wp.element,r=function(e){let{attributes:t}=e;const{source:r="",poster:o="",preload:m="metadata"}=t;return wp.element.createElement("div",{__self:this,__source:{fileName:l,lineNumber:6,columnNumber:5}},wp.element.createElement(n,{__self:this,__source:{fileName:l,lineNumber:7,columnNumber:9}},wp.element.createElement("video",{controls:!0,playsinline:!0,"data-poster":o,preload:m,__self:this,__source:{fileName:l,lineNumber:8,columnNumber:13}},"Your browser does not support the video tag.",wp.element.createElement("source",{src:r,type:"video/mp4",__self:this,__source:{fileName:l,lineNumber:10,columnNumber:15}}))))};var o="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\Player.js";const m=function(e){let{classes:l="",attributes:t}=e;const{width:n,radius:m}=t,i=0===n.number?"100%":n.number+n.unit,a=m.number+m.unit;return wp.element.createElement("div",{className:l,id:"h5vp_player","data-settings":JSON.stringify({}),style:{width:i,borderRadius:a,overflow:"hidden",margin:"0 auto"},__self:this,__source:{fileName:o,lineNumber:8,columnNumber:5}},wp.element.createElement("div",{className:"videoWrapper",__self:this,__source:{fileName:o,lineNumber:14,columnNumber:7}},wp.element.createElement(r,{attributes:t,__self:this,__source:{fileName:o,lineNumber:15,columnNumber:9}})))};var i="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\BControls.js";const{__:a}=wp.i18n,{PanelBody:u,PanelRow:s,FormToggle:c}=wp.components,p=e=>{let{attributes:{controls:l},setAttributes:t}=e;return wp.element.createElement(u,{__self:void 0,__source:{fileName:i,lineNumber:72,columnNumber:5}},[{label:"Play Large",control:"play-large"},{label:"Restart",control:"restart"},{label:"Rewind",control:"rewind"},{label:"Play",control:"play"},{label:"Fast Forward",control:"fast-forward"},{label:"Progress",control:"progress"},{label:"Current Time",control:"current-time"},{label:"Duration",control:"duration"},{label:"Mute",control:"mute"},{label:"Volume",control:"volume"},{label:"PIP",control:"pip"},{label:"Airplay",control:"airplay"},{label:"Settings",control:"settings"},{label:"Download",control:"download"},{label:"Fullscreen",control:"fullscreen"}].map((e=>{let{label:n,control:r}=e;return wp.element.createElement(s,{__self:void 0,__source:{fileName:i,lineNumber:75,columnNumber:11}},wp.element.createElement("label",{htmlFor:r,className:"label",__self:void 0,__source:{fileName:i,lineNumber:76,columnNumber:13}},a(n,"h5vp")),wp.element.createElement(c,{id:r,checked:l[r],onChange:()=>(e=>{const n={...l};n[e]=!n[e],t({controls:n})})(r),__self:void 0,__source:{fileName:i,lineNumber:79,columnNumber:13}}))})))};var _="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\BUnit.js";const d=e=>{let{value:l="%",units:t=["px","em","%"],onChange:n}=e;return wp.element.createElement("div",{__self:void 0,__source:{fileName:_,lineNumber:11,columnNumber:3}},wp.element.createElement("ul",{className:"bButtonGroup",__self:void 0,__source:{fileName:_,lineNumber:12,columnNumber:4}},t.map((e=>wp.element.createElement("button",{bisactive:l==e?"true":"false",key:e,onClick:()=>n(e),__self:void 0,__source:{fileName:_,lineNumber:14,columnNumber:6}},e)))))};var b="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\BRangeControl.js";const{useState:N}=wp.element,{PanelRow:f,RangeControl:v,__experimentalNumberControl:w}=wp.components,h=e=>{const{label:l,enable:t={},value:n,onChange:r,units:o=["px","em","%"],max:m=100,min:i=0,finalMax:a=0,device:u,onChangeDevice:s,unit:c="px",onChangeUnit:p,step:_=1}=e,{eDevice:h=!0,eUnit:y=!0,eNumberControl:E=!0}=t,[g,k]=N(a||m);return wp.element.createElement("div",{__self:void 0,__source:{fileName:b,lineNumber:35,columnNumber:5}},l&&wp.element.createElement(f,{__self:void 0,__source:{fileName:b,lineNumber:37,columnNumber:9}},wp.element.createElement("label",{className:"label",__self:void 0,__source:{fileName:b,lineNumber:38,columnNumber:11}},l),h&&wp.element.createElement(BDevice,{style:{marginRight:"auto"},device:u,onChange:e=>s(e),__self:void 0,__source:{fileName:b,lineNumber:39,columnNumber:23}}),y&&wp.element.createElement(d,{units:o,value:c,onChange:e=>p(e),__self:void 0,__source:{fileName:b,lineNumber:40,columnNumber:21}})),wp.element.createElement(f,{__self:void 0,__source:{fileName:b,lineNumber:43,columnNumber:7}},wp.element.createElement("div",{style:E?{minWidth:"140px",marginRight:"15px"}:"",__self:void 0,__source:{fileName:b,lineNumber:44,columnNumber:9}},wp.element.createElement(v,{withInputField:!1,value:n,min:i,step:_,max:"vh"==c||"vw"==c?100:"rem"==c||"em"==c?10:"%"==c?100:m,onChange:e=>{r(e)},__self:void 0,__source:{fileName:b,lineNumber:45,columnNumber:11}})),E&&wp.element.createElement(w,{step:_,isShiftStepEnabled:!0,onChange:e=>{r(parseInt(e)),e>g&&k(e)},shiftStep:10,value:n,max:a||("px"==c?9999:100),min:i,__self:void 0,__source:{fileName:b,lineNumber:57,columnNumber:11}})))};var y="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\BMediaUpload.js";const{__:E}=wp.i18n,{Fragment:g}=wp.element,{MediaUpload:k,MediaUploadCheck:C}=wp.blockEditor,{Button:P,PanelRow:S,TextControl:x}=wp.components,B=function(e){let{value:l,type:t=[],onSelect:n,placeholder:r}=e;return wp.element.createElement("div",{className:"bMediaUpload",__self:this,__source:{fileName:y,lineNumber:7,columnNumber:5}},wp.element.createElement(g,{__self:this,__source:{fileName:y,lineNumber:8,columnNumber:7}},wp.element.createElement(C,{__self:this,__source:{fileName:y,lineNumber:9,columnNumber:9}},wp.element.createElement(k,{type:t,onSelect:e=>n(e.url),render:e=>{let{open:l}=e;return wp.element.createElement(P,{className:"button button-primary",onClick:l,icon:"upload",__self:this,__source:{fileName:y,lineNumber:13,columnNumber:35}})},__self:this,__source:{fileName:y,lineNumber:10,columnNumber:11}})),wp.element.createElement(S,{className:"width-100",__self:this,__source:{fileName:y,lineNumber:16,columnNumber:9}},wp.element.createElement(x,{placeholder:r,value:l,onChange:e=>n(e),__self:this,__source:{fileName:y,lineNumber:17,columnNumber:11}}))))};var j="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\Components\\BSettings.js";const{__:A}=wp.i18n,{TabPanel:T,Panel:D,PanelBody:O,PanelRow:F,FormToggle:L}=wp.components,{InspectorControls:M}=wp.blockEditor,{getCurrentPostId:U,getCurrentPostType:R}=wp.data.select("core/editor"),H=e=>{const{props:{attributes:l,setAttributes:t}}=e,{source:n,poster:r,repeat:o,radius:m,autoplay:i,muted:a,width:u,autoHideControl:s,resetOnEnd:c}=l,_=U();return wp.element.createElement(M,{style:{marginBottom:"40px"},__self:void 0,__source:{fileName:j,lineNumber:17,columnNumber:5}},"videoplayer"===R()&&wp.element.createElement(O,{__self:void 0,__source:{fileName:j,lineNumber:19,columnNumber:9}},wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:20,columnNumber:11}},wp.element.createElement("p",{style:{fontSize:"16px",lineHeight:"135%",color:"red"},__self:void 0,__source:{fileName:j,lineNumber:21,columnNumber:13}},wp.element.createElement("a",{target:"_blank",href:"edit.php?post_type=videoplayer&page=settings",__self:void 0,__source:{fileName:j,lineNumber:22,columnNumber:15}},A("Click Here","pdfp")),A(" to disable Gutenberg shortcode generator ( to back old generator)","pdfp")))),wp.element.createElement(O,{__self:void 0,__source:{fileName:j,lineNumber:30,columnNumber:7}},wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:31,columnNumber:9}},wp.element.createElement("div",{className:"h5vp_front_shortcode",__self:void 0,__source:{fileName:j,lineNumber:32,columnNumber:11}},wp.element.createElement("input",{value:`[html5_video id=${_}]`,__self:void 0,__source:{fileName:j,lineNumber:33,columnNumber:13}}),wp.element.createElement("span",{className:"htooltip",__self:void 0,__source:{fileName:j,lineNumber:34,columnNumber:13}},A("Copy To Clipboard","h5vp"))))),wp.element.createElement(T,{className:"bPSS",activeClass:"active-tab",tabs:[{name:"settings",title:"Settings",className:"general btTab"},{name:"controls",title:"Controls",className:"slider btTab"},{name:"style",title:"Style",className:"style btTab"}],__self:void 0,__source:{fileName:j,lineNumber:38,columnNumber:7}},(e=>wp.element.createElement("span",{__self:void 0,__source:{fileName:j,lineNumber:62,columnNumber:13}},"settings"==e.name&&wp.element.createElement("span",{__self:void 0,__source:{fileName:j,lineNumber:64,columnNumber:17}},wp.element.createElement(D,{__self:void 0,__source:{fileName:j,lineNumber:65,columnNumber:19}},wp.element.createElement(O,{title:A("Settings","h5vp"),__self:void 0,__source:{fileName:j,lineNumber:66,columnNumber:21}},wp.element.createElement(B,{type:["audio/mp3"],onSelect:e=>t({source:e}),value:n,placeholder:"Video Source",__self:void 0,__source:{fileName:j,lineNumber:67,columnNumber:23}}),wp.element.createElement(B,{type:["image"],onSelect:e=>t({poster:e}),value:r,placeholder:"Video Thumbnail",__self:void 0,__source:{fileName:j,lineNumber:68,columnNumber:23}}),wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:69,columnNumber:23}},wp.element.createElement("label",{htmlFor:"repeat",className:"label",__self:void 0,__source:{fileName:j,lineNumber:70,columnNumber:25}},A("Repeat","h5vp")),wp.element.createElement(L,{id:"repeat",checked:o,onChange:()=>t({repeat:!o}),__self:void 0,__source:{fileName:j,lineNumber:73,columnNumber:25}})),wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:75,columnNumber:23}},wp.element.createElement("label",{htmlFor:"autoplay",className:"label",__self:void 0,__source:{fileName:j,lineNumber:76,columnNumber:25}},A("Autoplay","h5vp")),wp.element.createElement(L,{id:"autoplay",checked:i,onChange:()=>t({autoplay:!i}),__self:void 0,__source:{fileName:j,lineNumber:79,columnNumber:25}})),wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:81,columnNumber:23}},wp.element.createElement("label",{htmlFor:"muted",className:"label",__self:void 0,__source:{fileName:j,lineNumber:82,columnNumber:25}},A("Muted","h5vp")),wp.element.createElement(L,{id:"muted",checked:a,onChange:()=>t({muted:!a}),__self:void 0,__source:{fileName:j,lineNumber:85,columnNumber:25}})),!o&&wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:88,columnNumber:25}},wp.element.createElement("label",{htmlFor:"resetOnEnd",className:"label",__self:void 0,__source:{fileName:j,lineNumber:89,columnNumber:27}},A("Reset On End","h5vp")),wp.element.createElement(L,{id:"resetOnEnd",checked:c,onChange:()=>t({resetOnEnd:!c}),__self:void 0,__source:{fileName:j,lineNumber:92,columnNumber:27}})),wp.element.createElement(F,{__self:void 0,__source:{fileName:j,lineNumber:95,columnNumber:23}},wp.element.createElement("label",{htmlFor:"autoHideControl",className:"label",__self:void 0,__source:{fileName:j,lineNumber:96,columnNumber:25}},A("Auto Hide Control","h5vp")),wp.element.createElement(L,{id:"autoHideControl",checked:s,onChange:()=>t({autoHideControl:!s}),__self:void 0,__source:{fileName:j,lineNumber:99,columnNumber:25}}))))),"controls"==e.name&&wp.element.createElement(p,{attributes:l,setAttributes:t,__self:void 0,__source:{fileName:j,lineNumber:105,columnNumber:42}}),"style"==e.name&&wp.element.createElement("span",{__self:void 0,__source:{fileName:j,lineNumber:107,columnNumber:17}},wp.element.createElement(D,{__self:void 0,__source:{fileName:j,lineNumber:108,columnNumber:19}},wp.element.createElement(O,{__self:void 0,__source:{fileName:j,lineNumber:109,columnNumber:21}},wp.element.createElement(h,{label:A("Width","h5vp"),enable:{eDevice:!1},value:u.number,unit:u.unit,max:1e3,onChange:e=>t({width:{...u,number:e}}),onChangeUnit:e=>t({width:{number:0,unit:e}}),__self:void 0,__source:{fileName:j,lineNumber:110,columnNumber:23}}),wp.element.createElement(h,{label:A("Round Corner","h5vp"),enable:{eDevice:!1},value:m.number,unit:m.unit,max:100,onChange:e=>t({radius:{...m,number:e}}),onChangeUnit:e=>t({radius:{number:0,unit:e}}),__self:void 0,__source:{fileName:j,lineNumber:119,columnNumber:23}}))))))))};var V="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\html5-video-player\\src\\blocks\\video\\Edit.js";const{Fragment:I,useEffect:q,useState:z}=wp.element,{__:W}=wp.i18n,{MediaUpload:$,MediaUploadCheck:G,URLPopover:Q}=wp.blockEditor,{Button:Y,Placeholder:J}=wp.components,{__:K}=wp.i18n,{registerBlockType:X}=wp.blocks;X("html5-player/video",{title:K("HTML5 Video Player","h5vp"),icon:"video-alt2",category:"media",keywords:[K("HTML5 Video Player","h5vp"),K("Media Player","h5vp"),K("Video","h5vp")],supports:{html:!1},attributes:{clientId:{type:"string"},source:{type:"string"},poster:{type:"string"},controls:{type:"object",default:{"play-large":!0,restart:!1,rewind:!0,play:!0,"fast-forward":!0,progress:!0,"current-time":!0,duration:!1,mute:!0,volume:!0,pip:!1,airplay:!1,settings:!0,download:!1,fullscreen:!0}},width:{type:"object",default:{number:100,unit:"%"}},radius:{type:"object",default:{number:0,unit:"px"}},repeat:{type:"boolean",default:!1},autoplay:{type:"boolean",default:!1},muted:{type:"boolean",default:!1},resetOnEnd:{type:"boolean",default:!1},autoHideControl:{type:"boolean",default:!0}},getEditWrapperProps:()=>{},edit:l=>{const{attributes:t,setAttributes:n,clientId:r,isSelected:o}=l,{controls:i,source:a,poster:u,repeat:s,muted:c,popup:p,autoHideControl:_,width:d}=t,[b,N]=z(),f={source:a,poster:u,setSource:!0},v={controls:(e=>{const l=[];return Object.keys(e).map(((t,n)=>{e[t]&&l.push(t)})),l})(i),clickToPlay:!1,loop:{active:s},muted:c,hideControls:_};return q((()=>{if(a){const l=document.createElement("video"),t=document.querySelector(`#block-${r} .h5vp_player`),n=document.querySelector(`#block-${r} .h5vp_player .videoWrapper`);n.innerHTML="",n.appendChild(l),e.K.initialize(t,v,f,!0)}}),[i,a,u,p,d]),q((()=>{o&&wp.data.dispatch("core/edit-post").openGeneralSidebar("edit-post/block")}),[o]),wp.element.createElement(I,{__self:void 0,__source:{fileName:V,lineNumber:67,columnNumber:5}},a?wp.element.createElement(I,{__self:void 0,__source:{fileName:V,lineNumber:69,columnNumber:9}},wp.element.createElement(H,{props:l,__self:void 0,__source:{fileName:V,lineNumber:70,columnNumber:11}}),wp.element.createElement(m,{classes:"h5vp_player ",attributes:t,__self:void 0,__source:{fileName:V,lineNumber:71,columnNumber:11}})):wp.element.createElement(I,{__self:void 0,__source:{fileName:V,lineNumber:74,columnNumber:9}},wp.element.createElement(J,{icon:wp.element.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",className:"html5-block-icon",__self:void 0,__source:{fileName:V,lineNumber:77,columnNumber:15}},wp.element.createElement("polygon",{points:"23 7 16 12 23 17 23 7",__self:void 0,__source:{fileName:V,lineNumber:89,columnNumber:17}}),wp.element.createElement("rect",{x:"1",y:"5",width:"15",height:"14",rx:"2",ry:"2",__self:void 0,__source:{fileName:V,lineNumber:90,columnNumber:17}})),instructions:W("Upload a video or paste/write video url to get started.","h5vp"),label:W("Upload a Video ","h5vp"),__self:void 0,__source:{fileName:V,lineNumber:75,columnNumber:11}},wp.element.createElement(G,{__self:void 0,__source:{fileName:V,lineNumber:99,columnNumber:13}},wp.element.createElement($,{type:["image"],onSelect:e=>n({source:e.url}),render:e=>{let{open:l}=e;return wp.element.createElement(Y,{isPrimary:!0,onClick:l,__self:void 0,__source:{fileName:V,lineNumber:104,columnNumber:19}},W("Upload","h5vp"))},__self:void 0,__source:{fileName:V,lineNumber:100,columnNumber:15}})),wp.element.createElement("div",{className:"h5vpUrlInput",__self:void 0,__source:{fileName:V,lineNumber:110,columnNumber:13}},wp.element.createElement("h3",{style:{fontSize:"15px"},__self:void 0,__source:{fileName:V,lineNumber:111,columnNumber:15}}," Or "),wp.element.createElement("input",{type:"url","aria-label":W("URL","h5vp"),placeholder:W("Paste or type a video URL","h5vp"),onChange:e=>N(e.target.value),value:b,__self:void 0,__source:{fileName:V,lineNumber:112,columnNumber:15}}),wp.element.createElement(Y,{label:W("Apply","h5vp"),type:"submit",onClick:e=>{e.preventDefault(),n({source:b}),N("")},isPrimary:!0,__self:void 0,__source:{fileName:V,lineNumber:119,columnNumber:15}},"Apply")))))},save:()=>null,example:{attributes:!0}})})()})();