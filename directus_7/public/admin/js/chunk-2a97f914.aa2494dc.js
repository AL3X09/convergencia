(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2a97f914"],{"9bf8":function(t,e,n){},ba5e:function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{ref:"timeline",attrs:{id:"timeline"}},[t._l(t.days,function(t){return n("Day",{key:t.id,attrs:{date:t.date,events:t.events}})}),t.lazyLoading?n("div",{staticClass:"lazy-loader"},[n("v-spinner",{attrs:{"line-fg-color":"var(--light-gray)","line-bg-color":"var(--lighter-gray)"}})],1):t._e()],2)},i=[],s=(n("7514"),n("c3ff")),o=n.n(s),c=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"day"},[n("div",{staticClass:"date"},[t._v("\n    Activity on "+t._s(t.$t("months."+t.$parent.monthNames[t.date.getMonth()]))+" "+t._s(t.date.getDate())+",\n    "+t._s(t.date.getFullYear())+"\n  ")]),n("div",{staticClass:"events"},t._l(t.events,function(e,a){return n("Event",{key:a,attrs:{data:e,connect:a<t.events.length-1}})}),1)])},r=[],l=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"event"},[n("div",{staticClass:"line",class:{connect:t.connect}},[n("div",{staticClass:"point",style:{backgroundColor:"var(--"+(t.data.color||"gray")+")"}})]),n("div",{staticClass:"container",on:{click:function(e){return t.$router.push(t.data.to)}}},[n("div",{staticClass:"title"},[t._v("\n      "+t._s(t.data.title)+"\n    ")]),n("div",{staticClass:"content"},[t.data.contentType?n("v-ext-display",{staticClass:"display",attrs:{id:t.data.contentType.name,name:t.data.contentType.name,type:t.data.contentType.type,value:t.data.content,"interface-type":t.data.contentType.interface,options:t.data.contentType.options},nativeOn:{click:function(t){t.stopPropagation()}}}):t._e(),n("v-timeago",{staticClass:"time",attrs:{datetime:t.data.time,"auto-update":86400,locate:t.$i18n.locale}})],1)])])},d=[],u={components:{},props:{data:{type:Object,default:null},connect:{type:Boolean,default:!0}},data:function(){return{}},computed:{},created:function(){},mounted:function(){},destroyed:function(){},methods:{}},p=u,f=(n("c050"),n("2877")),y=Object(f["a"])(p,l,d,!1,null,"0d0d2d0a",null),v=y.exports,h={components:{Event:v},props:{date:{type:Date,default:new Date},events:{type:Object,default:null}},data:function(){return{}},computed:{},created:function(){},mounted:function(){},destroyed:function(){},methods:{}},m=h,g=(n("ce5e"),Object(f["a"])(m,c,r,!1,null,"70592772",null)),w=g.exports,b={components:{Day:w},mixins:[o.a],data:function(){return{actionColor:{create:"success",update:"success",authenticate:"dark-gray",delete:"warning",upload:"accent"},monthNames:["january","february","march","april","may","june","july","august","september","october","november","december"],weekNames:["monday","tuesday","wednesday","thursday","friday","saturday","sunday"]}},computed:{days:function(){for(var t=[],e=0;e<this.items.length;e++){var n=this.items[e];if(!this.viewOptions.date)return;var a=new Date(n[this.viewOptions.date].substr(0,10)+"T00:00:00"),i=this.$lodash.find(t,{date:a}),s=null;this.viewOptions.color&&n[this.viewOptions.color]&&(s=n[this.viewOptions.color],this.fields[this.viewOptions.color]&&"action"==this.fields[this.viewOptions.color].field&&(s=this.actionColor[s]));var o=this.viewOptions.content?this.fields[this.viewOptions.content]:null,c={time:new Date(n[this.viewOptions.date]),title:this.$helpers.micromustache.render(this.viewOptions.title,n),content:n[this.viewOptions.content],contentType:o,color:s,to:n.__link__};i?i.events.push(c):t.push({date:a,events:[c]})}return t}},created:function(){document.addEventListener("scroll",this.scroll),this.$emit("query",{sort:"-"+this.viewOptions.date})},destroyed:function(){document.removeEventListener("scroll",this.scroll)},methods:{scroll:function(t){var e=this.$refs.timeline,n=e.offsetTop+e.clientHeight-window.innerHeight-t.pageY;n<100&&!this.lazyLoading&&this.$emit("next-page")}}},O=b,_=Object(f["a"])(O,a,i,!1,null,null,null);e["default"]=_.exports},c050:function(t,e,n){"use strict";var a=n("9bf8"),i=n.n(a);i.a},c3ff:function(t,e){t.exports={props:{primaryKeyField:{type:String,required:!0},fields:{type:Object,required:!0},items:{type:Array,default:()=>[]},viewOptions:{type:Object,default:()=>({})},viewQuery:{type:Object,default:()=>({})},loading:{type:Boolean,default:!1},lazyLoading:{type:Boolean,default:!1},selection:{type:Array,default:()=>[]},link:{type:String,default:null},sortField:{type:String,default:null},collection:{type:String,default:null}}}},ce5e:function(t,e,n){"use strict";var a=n("d6b5"),i=n.n(a);i.a},d6b5:function(t,e,n){}}]);
//# sourceMappingURL=chunk-2a97f914.aa2494dc.js.map