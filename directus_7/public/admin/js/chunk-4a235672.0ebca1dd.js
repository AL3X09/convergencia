(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4a235672"],{4433:function(e,t,n){"use strict";var l=n("61b2"),u=n.n(l);u.a},"61b2":function(e,t,n){},"8db2":function(e,t){e.exports={props:{id:{type:String,required:!0},name:{type:String,required:!0},value:{type:null,default:null},type:{type:String,required:!0},length:{type:[String,Number],default:null},readonly:{type:Boolean,default:!1},collection:{type:String,default:null},required:{type:Boolean,default:!1},options:{type:Object,default:()=>({})},newItem:{type:Boolean,default:!1},relation:{type:Object,default:null},fields:{type:Object,default:null},values:{type:Object,default:null}}}},"900d":function(e,t,n){"use strict";n.r(t);var l=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-select",{attrs:{id:e.name,value:e.userID,disabled:e.readonly,options:e.choices,placeholder:e.options.placeholder},on:{input:function(t){return e.$emit("input",t)}}})},u=[],a=(n("456d"),n("ac6a"),n("7618")),i=n("8db2"),r=n.n(i),o={mixins:[r.a],computed:{userID:function(){return this.value?"object"===Object(a["a"])(this.value)?this.value.id:this.value:null},choices:function(){var e=this,t=this.$store.state.users||{},n={};return Object.keys(t).forEach(function(l){n[l]=e.$helpers.micromustache.render(e.options.template,t[l])}),n}}},c=o,s=(n("4433"),n("2877")),d=Object(s["a"])(c,l,u,!1,null,"0d3af85c",null);t["default"]=d.exports}}]);
//# sourceMappingURL=chunk-4a235672.0ebca1dd.js.map