(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-fc0262f0"],{"06aa":function(t,e,n){},"0af4":function(t,e,n){"use strict";var a=n("2fec"),i=n.n(a);i.a},"2fec":function(t,e,n){},"33c9":function(t,e,n){"use strict";var a=n("649f"),i=n.n(a);i.a},"614d":function(t,e,n){},"649f":function(t,e,n){},"70dd":function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"calendar"}},[n("div",{attrs:{id:"header"}},[n("div",{attrs:{id:"header-start"}},[n("div",{ref:"dropdown",attrs:{id:"date"}},[t._v("\n        "+t._s(t.$t("months."+t.monthNames[t.date.getMonth()]))+"\n        "+t._s(t.date.getFullYear())+"\n        "),n("transition",{attrs:{name:"months"}},[n("div",{directives:[{name:"show",rawName:"v-show",value:t.showMonthSelect,expression:"showMonthSelect"}],attrs:{id:"date-select"}},[n("div",{attrs:{id:"date-header"}},[n("button",{on:{click:function(e){return t.decreaseYear()}}},[n("v-icon",{attrs:{name:"arrow_back"}})],1),t._v("\n              "+t._s(t.date.getFullYear())+"\n              "),n("button",{on:{click:function(e){return t.increaseYear()}}},[n("v-icon",{attrs:{name:"arrow_forward"}})],1)]),n("div",{attrs:{id:"date-months"}},t._l(12,function(e){return n("div",{key:e,class:t.date.getMonth()+1==e?"mark-month":"",on:{click:function(n){t.setMonth(t.monthDistance-t.date.getMonth()+(e-1))}}},[t._v("\n                "+t._s(t.monthNames[e-1].substr(0,3))+"\n              ")])}),0)])])],1),n("div",{attrs:{id:"arrows"}},[n("button",{on:{click:function(e){return t.decreaseMonth()}}},[n("v-icon",{staticClass:"icon",attrs:{name:"arrow_back"}})],1),n("button",{on:{click:function(e){return t.increaseMonth()}}},[n("v-icon",{staticClass:"icon",attrs:{name:"arrow_forward"}})],1)])]),n("div",{attrs:{id:"header-end"}},[n("div",{staticClass:"button style-btn",class:{hidden:0==t.monthDistance},attrs:{id:"today"},on:{click:function(e){return t.resetMonth()}}},[t._v("\n        "+t._s(t.$t("layouts-calendar-today"))+"\n      ")])])]),n("div",{attrs:{id:"display"}},[n("transition",{attrs:{name:t.swipeTo}},[n("Calendar",{key:t.monthDistance,attrs:{month:t.monthDistance,items:t.items},on:{day:t.openPopup},nativeOn:{wheel:function(e){return t.scroll(e)}}})],1)],1),n("Popup",{attrs:{open:t.showPopup,parentdate:t.popupDate,parentevents:t.events},on:{close:function(e){t.showPopup=!1}}})],1)},i=[],s=(n("55dd"),n("ac6a"),n("bd86")),o=n("c3ff"),r=n.n(o),c=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"view"}},t._l(42,function(e){return n("Day",{key:e,attrs:{display:t.display(e),week:t.renderWeek(e),date:t.renderDate(e),events:t.events(e)},on:{popup:function(n){t.$emit("day",t.getDate(e))}},nativeOn:{click:function(n){t.$emit("day",t.getDate(e))}}})}),1)},d=[],h=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"day",class:{hidden:t.hidden,today:t.today}},[n("div",{staticClass:"header"},[t.isWeek?n("div",{staticClass:"header-week"},[t._v(t._s(t.week.substr(0,3)))]):t._e(),n("div",{staticClass:"header-day"},[t._v(t._s(t.date))])]),n("div",{staticClass:"events"},t._l(t.eventList,function(e){return n("a",{key:e.id,on:{click:function(n){return n.stopPropagation(),t.goToItem(e.id)}}},[n("div",{staticClass:"event",class:-1==e.id?"event-more":"",style:e.color,on:{click:function(n){-1==e.id&&t.$emit("popup")}}},[n("span",{staticClass:"title"},[t._v(t._s(e.title))]),n("span",{staticClass:"time"},[t._v(t._s(e.time.substr(0,5)))])])])}),0)])},u=[],l={props:["week","display","date","events"],data:function(){return{}},methods:{goToItem:function(t){-1!==t&&this.$router.push("/collections/".concat(this.$parent.$parent.collection,"/").concat(t))}},computed:{hidden:function(){return"hidden"==this.display},today:function(){return"today"==this.display},isWeek:function(){return null!=this.week},eventList:function(){if(this.events){var t=this.events,e=(this.$parent.innerHeight-120)/6;e-=32,this.isWeek&&(e-=15),this.today&&(e-=5);var n=Math.floor(e/22);return t.length>n&&(t=t.slice(0,n-1),t.push({id:-1,title:this.$t("layouts-calendar-moreEvents",{amount:this.events.length-n+1}),time:""})),t}}}},p=l,v=(n("33c9"),n("2877")),f=Object(v["a"])(p,h,u,!1,null,"07bf6b62",null),m=f.exports,g={components:{Day:m},props:["month","items"],data:function(){return{innerHeight:window.innerHeight}},computed:{date:function(){var t=new Date;return t=new Date(t.getFullYear(),t.getMonth()+this.month,1),t},monthBegin:function(){var t=new Date(this.date.getFullYear(),this.date.getMonth(),1).getDay();return 0==t?7:t},monthLength:function(){return new Date(this.date.getFullYear(),this.date.getMonth()+1,0).getDate()},today:function(){var t=new Date;return t.getDate()}},created:function(){var t=this;this.updateHeight=_.throttle(this.updateHeight,100),window.addEventListener("resize",function(){t.updateHeight()})},destroyed:function(){var t=this;window.removeEventListener("resize",function(){t.updateHeight()})},methods:{events:function(t){var e=new Date(this.date.getFullYear(),this.date.getMonth(),t-this.monthBegin+1);return this.$parent.eventsAtDay(e)},renderWeek:function(t){return t<8?this.$t("weeks."+this.$parent.weekNames[t-1]):null},renderDate:function(t){var e=new Date(this.date.getFullYear(),this.date.getMonth(),t-this.monthBegin+1);return e.getDate()},getDate:function(t){var e=new Date(this.date.getFullYear(),this.date.getMonth(),t-this.monthBegin+1);return e},display:function(t){return t<this.monthBegin||t>=this.monthBegin+this.monthLength?"hidden":0==this.month&&t-this.monthBegin+1==this.today?"today":t-this.monthBegin<this.monthLength?"default":void 0},updateHeight:function(){this.innerHeight=window.innerHeight}}},w=g,y=(n("7ff7"),Object(v["a"])(w,c,d,!1,null,"3643fce2",null)),D=y.exports,k=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("transition",{attrs:{name:"popup"}},[n("div",{directives:[{name:"show",rawName:"v-show",value:t.open,expression:"open"}],attrs:{id:"wrapper"}},[n("div",{attrs:{id:"background"},on:{click:function(e){return t.close()}}}),n("div",{attrs:{id:"popup"}},[n("div",{attrs:{id:"sidebar-header"}},[t._v("\n        "+t._s(t.$t("months."+t.$parent.monthNames[t.date.getMonth()]))+"\n        "+t._s(t.date.getFullYear())+"\n      ")]),n("div",{attrs:{id:"sidebar"},on:{wheel:t.scroll}},[n("transition",{attrs:{name:t.moveSidebar}},[n("div",{attrs:{id:"dates-container"}},t._l(t.days,function(e){return n("div",{key:e.date.getDate(),staticClass:"dates",on:{click:function(n){return t.changeDay(e.index)}}},[n("span",{staticClass:"dates-day"},[t._v(t._s(t.weekname(e.date.getDay())))]),n("span",{staticClass:"dates-date"},[t._v(t._s(e.date.getDate()))]),n("div",{class:t.getEventCount(e.date)>0?"date-counter":"date-counter-hidden"},[t._v("\n                "+t._s(t.getEventCount(e.date))+"\n              ")])])}),0)])],1),n("div",{attrs:{id:"header"}},[n("span",[t._v(t._s(t.$t("layouts-calendar-events")))]),n("button",{on:{click:t.close}},[n("v-icon",{attrs:{name:"close"}})],1)]),n("div",{attrs:{id:"events"}},[t._l(t.events,function(e){return n("div",{key:e.title,staticClass:"event",style:e.color,on:{click:function(n){return t.goToItem(e.id)}}},[n("span",[t._v(t._s(e.title))]),n("span",[t._v(t._s(e.time.substr(0,5)))])])}),0==t.getEventCount(t.date)?n("div",{attrs:{id:"events-none"}},[n("span",[t._v(t._s(t.randomEmoji()))]),n("br"),n("br"),n("span",[t._v(t._s(t.$t("layouts-calendar-noEvents")))])]):t._e()],2),n("a",{attrs:{id:"add",href:t.addItemURL}},[n("v-icon",{attrs:{name:"add"}})],1)])])])},b=[],M={components:{},props:["open","parentdate","parentevents"],data:function(){return{moveSidebar:"move-0",date:""}},computed:{days:function(){for(var t=new Array,e=-4;e<=4;e++){var n=new Date(this.date.getFullYear(),this.date.getMonth(),this.date.getDate()+e);t.push({date:n,index:e})}return t},events:function(){return this.$parent.eventsAtDay(this.date)},addItemURL:function(){var t=this.$root._router.currentRoute.path;return"#"+t+"/+"}},created:function(){this.date=this.parentdate,this.scroll=_.throttle(this.scroll,150)},methods:{weekname:function(t){return this.$t("weeks."+this.$parent.weekNames[0==t?6:t-1]).substr(0,3)},goToItem:function(t){this.$router.push("/collections/".concat(this.$parent.collection,"/").concat(t))},changeDay:function(t){this.moveSidebar="move-"+t;var e=new Date(this.date.getFullYear(),this.date.getMonth(),this.date.getDate()+t);this.date=e,this.$parent.popupDate=e},close:function(){this.$emit("close"),this.moveSidebar="move-0"},getEventCount:function(t){var e=0,n=this.$parent.viewOptions.date,a=this.$parent.viewOptions.datetime;if(n||a){for(var i=0;i<this.parentevents.length;i++){var s=this.parentevents[i],o="";o="__none__"!==a?new Date(s[a]):new Date(s[n]+"T00:00:00"),this.$parent.isSameDay(t,o)&&e++}return e}},randomEmoji:function(){var t=["(≧︿≦)","¯\\(°_o)/¯","(⌐⊙_⊙)","( º﹃º )","¯\\_(ツ)_/¯","(·.·)","\\(°Ω°)/"],e=Math.floor(Math.random()*t.length);return t[e]},scroll:function(t){t.deltaY>0?this.changeDay(1):this.changeDay(-1)}}},$=M,C=(n("74d2"),Object(v["a"])($,k,b,!1,null,"c3d6ca80",null)),Y=C.exports,F={components:{Calendar:D,Popup:Y},mixins:[r.a],props:["items"],data:function(){return{monthDistance:0,swipeTo:"left",showPopup:!1,popupDate:new Date,events:[],showMonthSelect:!1,monthNames:["january","february","march","april","may","june","july","august","september","october","november","december"],weekNames:["monday","tuesday","wednesday","thursday","friday","saturday","sunday"]}},computed:{date:function(){var t=new Date;return t=new Date(t.getFullYear(),t.getMonth()+this.monthDistance,1),t}},watch:{date:function(t){this.getData(t)}},created:function(){this.getData(this.date),this.scroll=_.throttle(this.scroll,200),document.addEventListener("click",this.documentClick),document.addEventListener("keypress",this.keyPress)},destroyed:function(){document.removeEventListener("click",this.documentClick),document.removeEventListener("keypress",this.keyPress)},methods:{getData:function(t){var e=this;this.$store.dispatch("loadingStart",{id:"fetch_cal_items"});var n=this.viewOptions.date,a=this.viewOptions.datetime,i="";i="__none__"!==a?a:n;var o=new Date(t.getFullYear(),t.getMonth()+1,0),r=t.getFullYear()+"-"+(t.getMonth()+1)+"-"+t.getDate()+" "+t.getHours()+":"+t.getMinutes()+":"+t.getSeconds(),c=o.getFullYear()+"-"+(o.getMonth()+1)+"-"+o.getDate()+" "+o.getHours()+":"+o.getMinutes()+":"+o.getSeconds(),d=Object(s["a"])({},i,{between:r+","+c});this.$api.getItems(this.$parent.collection,{fields:"*.*.*",filter:d}).then(function(t){t.data.forEach(function(t){t.to="test"}),e.events=t.data,e.$store.dispatch("loadingFinished","fetch_cal_items")}).catch(function(t){console.log(t),e.$store.dispatch("loadingFinished","fetch_cal_items")})},increaseYear:function(){this.swipeTo="right",this.monthDistance+=12},decreaseYear:function(){this.swipeTo="left",this.monthDistance-=12},increaseMonth:function(){this.swipeTo="right",this.monthDistance++},decreaseMonth:function(){this.swipeTo="left",this.monthDistance--},resetMonth:function(){this.swipeTo=this.monthDistance>0?"left":"right",this.monthDistance=0},setMonth:function(t){this.swipeTo=this.monthDistance-t>0?"left":"right",this.monthDistance=t},openPopup:function(t){this.showPopup=!0,this.popupDate=t},eventsAtDay:function(t){var e=[],n=this.viewOptions.date,a=this.viewOptions.datetime,i=this.viewOptions.title,s=this.viewOptions.time,o=this.viewOptions.color;if(!(n&&a||!i)){for(var r=0;r<this.events.length;r++){var c=this.events[r],d="",h="";"__none__"!==a?(d=new Date(c[a]),h="__none__"===s?c[a].slice(-8):c[s]&&0!=s?c[s]:""):(d=new Date(c[n]+"T00:00:00"),h=c[s]&&0!=s?c[s]:"");var u=c[o];if(d&&(u||(u="accent"),u="background-color: var(--".concat(u,")"),this.isSameDay(t,d))){var l={id:c.id,title:c[i],to:c.__link__,time:h,color:u};e.push(l)}}return 0!=s&&e.sort(this.compareTime),e}},compareTime:function(t,e){var n=this.viewOptions.time;if(""==t[n]&&""==e[n])return 0;if(""!=t[n]&&""==e[n])return-1;if(""==t[n]&&""!=e[n])return 1;var a=new Date("1970-01-01T"+t[n]),i=new Date("1970-01-01T"+e[n]);return a>i?1:a<i?-1:0},isSameDay:function(t,e){return t.getFullYear()==e.getFullYear()&&t.getMonth()==e.getMonth()&&t.getDate()==e.getDate()},documentClick:function(t){var e=this.$refs.dropdown,n=t.target;this.showMonthSelect=n===e&&!this.showMonthSelect||e.contains(n)&&n!==e},keyPress:function(t){switch(t.key){case"Escape":this.showPopup=!1;break;case"ArrowRight":this.increaseMonth();break;case"ArrowLeft":this.decreaseMonth();break;default:break}},scroll:function(t){t.deltaY>0?this.increaseMonth():this.decreaseMonth()}}},O=F,E=(n("0af4"),Object(v["a"])(O,a,i,!1,null,"67fc942d",null));e["default"]=E.exports},"74d2":function(t,e,n){"use strict";var a=n("06aa"),i=n.n(a);i.a},"7ff7":function(t,e,n){"use strict";var a=n("614d"),i=n.n(a);i.a},c3ff:function(t,e){t.exports={props:{primaryKeyField:{type:String,required:!0},fields:{type:Object,required:!0},items:{type:Array,default:()=>[]},viewOptions:{type:Object,default:()=>({})},viewQuery:{type:Object,default:()=>({})},loading:{type:Boolean,default:!1},lazyLoading:{type:Boolean,default:!1},selection:{type:Array,default:()=>[]},link:{type:String,default:null},sortField:{type:String,default:null},collection:{type:String,default:null}}}}}]);
//# sourceMappingURL=chunk-fc0262f0.f3370cae.js.map