Ext.ux.AddTabButton=(function(){
    function e(){
        this.addTab=this.itemTpl.insertBefore(this.edge,{
            id:this.id+"addTabButton",
            cls:"add-tab",
            text:this.addTabText||"&#160",
            iconCls:""
        },true);
        this.addTab.child("em.x-tab-left").setStyle("padding-right","6px");
        this.addTab.child("a.x-tab-right").setStyle("padding-left","6px");
        new Ext.ToolTip({
            target:this.addTab,
            bodyCfg:{
                html:"Add new tab"
            }
        });
        this.addTab.on({
            mousedown:c,
            click:b,
            scope:this
        })
    }
    function a(){
        this.scrollerWidth=(this.scrollRightWidth=this.scrollRight.getWidth())+this.scrollLeft.getWidth()
    }
    function d(){
        var h=(this.scrollLeft&&this.scrollLeft.isVisible()),j=this.tabPosition=="top"?"header":"footer";
        if(h){
            if(this.addTab.dom.parentNode===this.strip.dom){
                if(this.addTabWrap){
                    this.addTabWrap.show()
                }else{
                    this.addTabWrap=this[j].createChild({
                        cls:"x-tab-strip-wrap",
                        style:{
                            position:"absolute",
                            right:(this.scrollRightWidth+1)+"px",
                            top:0,
                            width:"30px",
                            margin:0
                        },
                        cn:{
                            tag:"ul",
                            cls:"x-tab-strip x-tab-strip-"+this.tabPosition,
                            style:{
                                width:"auto"
                            }
                        }
                    });
                    this.addTabWrap.setVisibilityMode(Ext.Element.DISPLAY);
                    this.addTabUl=this.addTabWrap.child("ul")
                }
                this.addTabUl.dom.appendChild(this.addTab.dom);
                this.addTab.setStyle("float","none")
            }
            this.stripWrap.setWidth(this[j].getWidth(true)-(this.scrollerWidth+31));
            this.stripWrap.setStyle("margin-right",(this.scrollRightWidth+31)+"px")
        }else{
            if((this.addTab.dom.parentNode!==this.strip.dom)){
                var g=(((this[j].getWidth(true)-this.edge.getOffsetsTo(this.stripWrap)[0]))<33);
                this.addTabWrap.hide();
                this.addTab.setStyle("float","");
                this.strip.dom.insertBefore(this.addTab.dom,this.edge.dom);
                this.stripWrap.setWidth(this.stripWrap.getWidth()+31);
                if(g){
                    this.autoScrollTabs()
                }
            }
        }
    }
    function f(){
        this.addTab.child(".x-tab-strip-inner").setStyle("width","14px")
    }
    function c(g){
        g.stopEvent()
    }
    function b(){
        this.setActiveTab(this.add(this.createTab?this.createTab():{
            title:"New Tab"
        }))
    }
    return{
        init:function(g){
            if(g instanceof Ext.TabPanel){
                g.onRender=g.onRender.createSequence(e);
                g.createScrollers=g.createScrollers.createSequence(a);
                g.autoScrollTabs=g.autoScrollTabs.createSequence(d);
                g.autoSizeTabs=g.autoSizeTabs.createSequence(f)
            }
        }
    }
})();
Ext.ux.AddTabButton=(function(){
    function e(){
        this.addTab=this.itemTpl.insertBefore(this.edge,{
            id:this.id+"addTabButton",
            cls:"add-tab",
            text:this.addTabText||"&#160",
            iconCls:""
        },true);
        this.addTab.child("em.x-tab-left").setStyle("padding-right","6px");
        this.addTab.child("a.x-tab-right").setStyle("padding-left","6px");
        new Ext.ToolTip({
            target:this.addTab,
            bodyCfg:{
                html:"Add new tab"
            }
        });
        this.addTab.on({
            mousedown:c,
            click:b,
            scope:this
        })
    }
    function a(){
        this.scrollerWidth=(this.scrollRightWidth=this.scrollRight.getWidth())+this.scrollLeft.getWidth()
    }
    function d(){
        var h=(this.scrollLeft&&this.scrollLeft.isVisible()),j=this.tabPosition=="top"?"header":"footer";
        if(h){
            if(this.addTab.dom.parentNode===this.strip.dom){
                if(this.addTabWrap){
                    this.addTabWrap.show()
                }else{
                    this.addTabWrap=this[j].createChild({
                        cls:"x-tab-strip-wrap",
                        style:{
                            position:"absolute",
                            right:(this.scrollRightWidth+1)+"px",
                            top:0,
                            width:"30px",
                            margin:0
                        },
                        cn:{
                            tag:"ul",
                            cls:"x-tab-strip x-tab-strip-"+this.tabPosition,
                            style:{
                                width:"auto"
                            }
                        }
                    });
                    this.addTabWrap.setVisibilityMode(Ext.Element.DISPLAY);
                    this.addTabUl=this.addTabWrap.child("ul")
                }
                this.addTabUl.dom.appendChild(this.addTab.dom);
                this.addTab.setStyle("float","none")
            }
            this.stripWrap.setWidth(this[j].getWidth(true)-(this.scrollerWidth+31));
            this.stripWrap.setStyle("margin-right",(this.scrollRightWidth+31)+"px")
        }else{
            if((this.addTab.dom.parentNode!==this.strip.dom)){
                var g=(((this[j].getWidth(true)-this.edge.getOffsetsTo(this.stripWrap)[0]))<33);
                this.addTabWrap.hide();
                this.addTab.setStyle("float","");
                this.strip.dom.insertBefore(this.addTab.dom,this.edge.dom);
                this.stripWrap.setWidth(this.stripWrap.getWidth()+31);
                if(g){
                    this.autoScrollTabs()
                }
            }
        }
    }
    function f(){
        this.addTab.child(".x-tab-strip-inner").setStyle("width","14px")
    }
    function c(g){
        g.stopEvent()
    }
    function b(){
        this.setActiveTab(this.add(this.createTab?this.createTab():{
            title:"New Tab"
        }))
    }
    return{
        init:function(g){
            if(g instanceof Ext.TabPanel){
                g.onRender=g.onRender.createSequence(e);
                g.createScrollers=g.createScrollers.createSequence(a);
                g.autoScrollTabs=g.autoScrollTabs.createSequence(d);
                g.autoSizeTabs=g.autoSizeTabs.createSequence(f)
            }
        }
    }
})();
Ext.ux.CheckColumn=function(a){
    Ext.apply(this,a);
    if(!this.id){
        this.id=Ext.id()
    }
    this.renderer=this.renderer.createDelegate(this)
};
    
Ext.ux.CheckColumn.prototype={
    init:function(a){
        this.grid=a;
        this.grid.on("render",function(){
            var b=this.grid.getView();
            b.mainBody.on("mousedown",this.onMouseDown,this)
        },this)
    },
    onMouseDown:function(d,c){
        if(Dbl.UserActivity.getValue("table_type")=="view"){
            return false
        }
        if(c.className&&c.className.indexOf("x-grid3-cc-"+this.id)!=-1){
            d.stopEvent();
            var f=this.grid.getView().findRowIndex(c);
            var a=this.grid.store.getAt(f);
            if((this.grid.id=="create_table_grid")||(this.grid.id=="alter_table_grid")){
                if(!a.data.field_name){
                    return false
                }else{
                    var b=this.grid.checkForEdit(a.data.datatype,this.dataIndex);
                    if(!b){
                        return false
                    }
                    if(this.dataIndex=="not_null"&&a.data.not_null===true&&a.data.primary_key===true){
                        return false
                    }
                }
            }
            a.set(this.dataIndex,!a.data[this.dataIndex]);
            if(this.grid.id=="alter_table_grid"){
                Ext.getCmp("alter_table_panel").getTopToolbar().get(0).enable();
                if(this.grid.modifiedFields.indexOf(a.data.field_name)==-1){
                    if(this.grid.changedFieldsOld.indexOf(a.data.field_name)==-1){
                        this.grid.modifiedFields.push(a.data.field_name)
                    }
                }
            }
        }
    },
    renderer:function(b,c,a){
        c.css+=" x-grid3-check-col-td";
        return'<div  class="x-grid3-check-col'+(b?"-on":"")+" x-grid3-cc-"+this.id+'"> </div>'
    }
};

Ext.CLIPBOARD_FLASH_URL="../extjs/resources/_clipboard.swf";
Ext.ux.ClipBoard=function(b,a){
    if(a){
        this.deleteDataAfterPaste=!!a
    }
    this.addEvents({
        copy:true,
        cut:true,
        paste:true,
        beforepaste:true
    });
    this.setData(b)
};
    
Ext.extend(Ext.ux.ClipBoard,Ext.util.Observable,{
    deleteDataAfterPaste:false,
    clipBoardHasData:true,
    setData:function(b){
        if(!this.deleteDataAfterPaste){
            if(!this.fireEvent("copy",b)){
                return false
            }
        }else{
            if(!this.fireEvent("cut",b)){
                return false
            }
        }
        var c=Ext.DomHelper.append(document.body,{
            tag:"embed",
            src:Ext.CLIPBOARD_FLASH_URL,
            FlashVars:"clipboard="+encodeURIComponent(b),
            width:0,
            height:0,
            bgcolor:"#cccccc",
            type:"application/x-shockwave-flash"
        },true);
        var a=function(){
            c.remove()
        };
    
        a.defer(10000);
        return true
    }
});
/*
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ns("Ext.ux.form");
Ext.ux.form.FileUploadField=Ext.extend(Ext.form.TextField,{
    buttonText:"Browse...",
    buttonOnly:false,
    buttonOffset:3,
    readOnly:true,
    autoSize:Ext.emptyFn,
    initComponent:function(){
        Ext.ux.form.FileUploadField.superclass.initComponent.call(this);
        this.addEvents("fileselected")
    },
    onRender:function(c,a){
        Ext.ux.form.FileUploadField.superclass.onRender.call(this,c,a);
        this.wrap=this.el.wrap({
            cls:"x-form-field-wrap x-form-file-wrap"
        });
        this.el.addClass("x-form-file-text");
        this.el.dom.removeAttribute("name");
        this.createFileInput();
        var b=Ext.applyIf(this.buttonCfg||{},{
            text:this.buttonText
        });
        this.button=new Ext.Button(Ext.apply(b,{
            renderTo:this.wrap,
            cls:"x-form-file-btn"+(b.iconCls?" x-btn-icon":"")
        }));
        if(this.buttonOnly){
            this.el.hide();
            this.wrap.setWidth(this.button.getEl().getWidth())
        }
        this.bindListeners();
        this.resizeEl=this.positionEl=this.wrap
    },
    bindListeners:function(){
        this.fileInput.on({
            scope:this,
            mouseenter:function(){
                this.button.addClass(["x-btn-over","x-btn-focus"])
            },
            mouseleave:function(){
                this.button.removeClass(["x-btn-over","x-btn-focus","x-btn-click"])
            },
            mousedown:function(){
                this.button.addClass("x-btn-click")
            },
            mouseup:function(){
                this.button.removeClass(["x-btn-over","x-btn-focus","x-btn-click"])
            },
            change:function(){
                var a=this.fileInput.dom.value;
                this.setValue(a);
                this.fireEvent("fileselected",this,a)
            }
        })
    },
    createFileInput:function(){
        this.fileInput=this.wrap.createChild({
            id:this.getFileInputId(),
            name:this.name||this.getId(),
            cls:"x-form-file",
            tag:"input",
            type:"file",
            size:1
        })
    },
    reset:function(){
        this.fileInput.remove();
        this.createFileInput();
        this.bindListeners();
        Ext.ux.form.FileUploadField.superclass.reset.call(this)
    },
    getFileInputId:function(){
        return this.id+"-file"
    },
    onResize:function(a,b){
        Ext.ux.form.FileUploadField.superclass.onResize.call(this,a,b);
        this.wrap.setWidth(a);
        if(!this.buttonOnly){
            var a=this.wrap.getWidth()-this.button.getEl().getWidth()-this.buttonOffset;
            this.el.setWidth(a)
        }
    },
    onDestroy:function(){
        Ext.ux.form.FileUploadField.superclass.onDestroy.call(this);
        Ext.destroy(this.fileInput,this.button,this.wrap)
    },
    onDisable:function(){
        Ext.ux.form.FileUploadField.superclass.onDisable.call(this);
        this.doDisable(true)
    },
    onEnable:function(){
        Ext.ux.form.FileUploadField.superclass.onEnable.call(this);
        this.doDisable(false)
    },
    doDisable:function(a){
        this.fileInput.dom.disabled=a;
        this.button.setDisabled(a)
    },
    preFocus:Ext.emptyFn,
    alignErrorIcon:function(){
        this.errorIcon.alignTo(this.wrap,"tl-tr",[2,0])
    }
});
Ext.reg("fileuploadfield",Ext.ux.form.FileUploadField);
Ext.form.FileUploadField=Ext.ux.form.FileUploadField;
/*
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ux.Spinner=Ext.extend(Ext.util.Observable,{
    incrementValue:1,
    alternateIncrementValue:5,
    triggerClass:"x-form-spinner-trigger",
    splitterClass:"x-form-spinner-splitter",
    alternateKey:Ext.EventObject.shiftKey,
    defaultValue:0,
    accelerate:false,
    constructor:function(a){
        Ext.ux.Spinner.superclass.constructor.call(this,a);
        Ext.apply(this,a);
        this.mimicing=false
    },
    init:function(a){
        this.field=a;
        a.afterMethod("onRender",this.doRender,this);
        a.afterMethod("onEnable",this.doEnable,this);
        a.afterMethod("onDisable",this.doDisable,this);
        a.afterMethod("afterRender",this.doAfterRender,this);
        a.afterMethod("onResize",this.doResize,this);
        a.afterMethod("onFocus",this.doFocus,this);
        a.beforeMethod("onDestroy",this.doDestroy,this)
    },
    doRender:function(b,a){
        var c=this.el=this.field.getEl();
        var d=this.field;
        if(!d.wrap){
            d.wrap=this.wrap=c.wrap({
                cls:"x-form-field-wrap"
            })
        }else{
            this.wrap=d.wrap.addClass("x-form-field-wrap")
        }
        this.trigger=this.wrap.createChild({
            tag:"img",
            src:Ext.BLANK_IMAGE_URL,
            cls:"x-form-trigger "+this.triggerClass
        });
        if(!d.width){
            this.wrap.setWidth(c.getWidth()+this.trigger.getWidth())
        }
        this.splitter=this.wrap.createChild({
            tag:"div",
            cls:this.splitterClass,
            style:"width:13px; height:2px;"
        });
        this.splitter.setRight((Ext.isIE)?1:2).setTop(10).show();
        this.proxy=this.trigger.createProxy("",this.splitter,true);
        this.proxy.addClass("x-form-spinner-proxy");
        this.proxy.setStyle("left","0px");
        this.proxy.setSize(14,1);
        this.proxy.hide();
        this.dd=new Ext.dd.DDProxy(this.splitter.dom.id,"SpinnerDrag",{
            dragElId:this.proxy.id
        });
        this.initTrigger();
        this.initSpinner()
    },
    doAfterRender:function(){
        var a;
        if(Ext.isIE&&this.el.getY()!=(a=this.trigger.getY())){
            this.el.position();
            this.el.setY(a)
        }
    },
    doEnable:function(){
        if(this.wrap){
            this.wrap.removeClass(this.field.disabledClass)
        }
    },
    doDisable:function(){
        if(this.wrap){
            this.wrap.addClass(this.field.disabledClass);
            this.el.removeClass(this.field.disabledClass)
        }
    },
    doResize:function(a,b){
        if(typeof a=="number"){
            this.el.setWidth(a-this.trigger.getWidth())
        }
        this.wrap.setWidth(this.el.getWidth()+this.trigger.getWidth())
    },
    doFocus:function(){
        if(!this.mimicing){
            this.wrap.addClass("x-trigger-wrap-focus");
            this.mimicing=true;
            Ext.get(Ext.isIE?document.body:document).on("mousedown",this.mimicBlur,this,{
                delay:10
            });
            this.el.on("keydown",this.checkTab,this)
        }
    },
    checkTab:function(a){
        if(a.getKey()==a.TAB){
            this.triggerBlur()
        }
    },
    mimicBlur:function(a){
        if(!this.wrap.contains(a.target)&&this.field.validateBlur(a)){
            this.triggerBlur()
        }
    },
    triggerBlur:function(){
        this.mimicing=false;
        Ext.get(Ext.isIE?document.body:document).un("mousedown",this.mimicBlur,this);
        this.el.un("keydown",this.checkTab,this);
        this.field.beforeBlur();
        this.wrap.removeClass("x-trigger-wrap-focus");
        this.field.onBlur.call(this.field)
    },
    initTrigger:function(){
        this.trigger.addClassOnOver("x-form-trigger-over");
        this.trigger.addClassOnClick("x-form-trigger-click")
    },
    initSpinner:function(){
        this.field.addEvents({
            spin:true,
            spinup:true,
            spindown:true
        });
        this.keyNav=new Ext.KeyNav(this.el,{
            up:function(a){
                a.preventDefault();
                this.onSpinUp()
            },
            down:function(a){
                a.preventDefault();
                this.onSpinDown()
            },
            pageUp:function(a){
                a.preventDefault();
                this.onSpinUpAlternate()
            },
            pageDown:function(a){
                a.preventDefault();
                this.onSpinDownAlternate()
            },
            scope:this
        });
        this.repeater=new Ext.util.ClickRepeater(this.trigger,{
            accelerate:this.accelerate
        });
        this.field.mon(this.repeater,"click",this.onTriggerClick,this,{
            preventDefault:true
        });
        this.field.mon(this.trigger,{
            mouseover:this.onMouseOver,
            mouseout:this.onMouseOut,
            mousemove:this.onMouseMove,
            mousedown:this.onMouseDown,
            mouseup:this.onMouseUp,
            scope:this,
            preventDefault:true
        });
        this.field.mon(this.wrap,"mousewheel",this.handleMouseWheel,this);
        this.dd.setXConstraint(0,0,10);
        this.dd.setYConstraint(1500,1500,10);
        this.dd.endDrag=this.endDrag.createDelegate(this);
        this.dd.startDrag=this.startDrag.createDelegate(this);
        this.dd.onDrag=this.onDrag.createDelegate(this)
    },
    onMouseOver:function(){
        if(this.disabled){
            return
        }
        var a=this.getMiddle();
        this.tmpHoverClass=(Ext.EventObject.getPageY()<a)?"x-form-spinner-overup":"x-form-spinner-overdown";
        this.trigger.addClass(this.tmpHoverClass)
    },
    onMouseOut:function(){
        this.trigger.removeClass(this.tmpHoverClass)
    },
    onMouseMove:function(){
        if(this.disabled){
            return
        }
        var a=this.getMiddle();
        if(((Ext.EventObject.getPageY()>a)&&this.tmpHoverClass=="x-form-spinner-overup")||((Ext.EventObject.getPageY()<a)&&this.tmpHoverClass=="x-form-spinner-overdown")){}
    },
    onMouseDown:function(){
        if(this.disabled){
            return
        }
        var a=this.getMiddle();
        this.tmpClickClass=(Ext.EventObject.getPageY()<a)?"x-form-spinner-clickup":"x-form-spinner-clickdown";
        this.trigger.addClass(this.tmpClickClass)
    },
    onMouseUp:function(){
        this.trigger.removeClass(this.tmpClickClass)
    },
    onTriggerClick:function(){
        if(this.disabled||this.el.dom.readOnly){
            return
        }
        var b=this.getMiddle();
        var a=(Ext.EventObject.getPageY()<b)?"Up":"Down";
        this["onSpin"+a]()
    },
    getMiddle:function(){
        var b=this.trigger.getTop();
        var c=this.trigger.getHeight();
        var a=b+(c/2);
        return a
    },
    isSpinnable:function(){
        if(this.disabled||this.el.dom.readOnly){
            Ext.EventObject.preventDefault();
            return false
        }
        return true
    },
    handleMouseWheel:function(a){
        if(this.wrap.hasClass("x-trigger-wrap-focus")==false){
            return
        }
        var b=a.getWheelDelta();
        if(b>0){
            this.onSpinUp();
            a.stopEvent()
        }else{
            if(b<0){
                this.onSpinDown();
                a.stopEvent()
            }
        }
    },
    startDrag:function(){
        this.proxy.show();
        this._previousY=Ext.fly(this.dd.getDragEl()).getTop()
    },
    endDrag:function(){
        this.proxy.hide()
    },
    onDrag:function(){
        if(this.disabled){
            return
        }
        var b=Ext.fly(this.dd.getDragEl()).getTop();
        var a="";
        if(this._previousY>b){
            a="Up"
        }
        if(this._previousY<b){
            a="Down"
        }
        if(a!=""){
            this["onSpin"+a]()
        }
        this._previousY=b
    },
    onSpinUp:function(){
        if(this.isSpinnable()==false){
            return
        }
        if(Ext.EventObject.shiftKey==true){
            this.onSpinUpAlternate();
            return
        }else{
            this.spin(false,false)
        }
        this.field.fireEvent("spin",this);
        this.field.fireEvent("spinup",this)
    },
    onSpinDown:function(){
        if(this.isSpinnable()==false){
            return
        }
        if(Ext.EventObject.shiftKey==true){
            this.onSpinDownAlternate();
            return
        }else{
            this.spin(true,false)
        }
        this.field.fireEvent("spin",this);
        this.field.fireEvent("spindown",this)
    },
    onSpinUpAlternate:function(){
        if(this.isSpinnable()==false){
            return
        }
        this.spin(false,true);
        this.field.fireEvent("spin",this);
        this.field.fireEvent("spinup",this)
    },
    onSpinDownAlternate:function(){
        if(this.isSpinnable()==false){
            return
        }
        this.spin(true,true);
        this.field.fireEvent("spin",this);
        this.field.fireEvent("spindown",this)
    },
    spin:function(d,b){
        var a=parseFloat(this.field.getValue());
        var c=(b==true)?this.alternateIncrementValue:this.incrementValue;
        (d==true)?a-=c:a+=c;
        a=(isNaN(a))?this.defaultValue:a;
        a=this.fixBoundries(a);
        this.field.setRawValue(a)
    },
    fixBoundries:function(b){
        var a=b;
        if(this.field.minValue!=undefined&&a<this.field.minValue){
            a=this.field.minValue
        }
        if(this.field.maxValue!=undefined&&a>this.field.maxValue){
            a=this.field.maxValue
        }
        return this.fixPrecision(a)
    },
    fixPrecision:function(b){
        var a=isNaN(b);
        if(!this.field.allowDecimals||this.field.decimalPrecision==-1||a||!b){
            return a?"":b
        }
        return parseFloat(parseFloat(b).toFixed(this.field.decimalPrecision))
    },
    doDestroy:function(){
        if(this.trigger){
            this.trigger.remove()
        }
        if(this.wrap){
            this.wrap.remove();
            delete this.field.wrap
        }
        if(this.splitter){
            this.splitter.remove()
        }
        if(this.dd){
            this.dd.unreg();
            this.dd=null
        }
        if(this.proxy){
            this.proxy.remove()
        }
        if(this.repeater){
            this.repeater.purgeListeners()
        }
    }
});
Ext.form.Spinner=Ext.ux.Spinner;
/*
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ns("Ext.ux.form");
Ext.ux.form.SpinnerField=Ext.extend(Ext.form.NumberField,{
    actionMode:"wrap",
    deferHeight:true,
    autoSize:Ext.emptyFn,
    onBlur:Ext.emptyFn,
    adjustSize:Ext.BoxComponent.prototype.adjustSize,
    constructor:function(c){
        var b=Ext.copyTo({},c,"incrementValue,alternateIncrementValue,accelerate,defaultValue,triggerClass,splitterClass");
        var d=this.spinner=new Ext.ux.Spinner(b);
        var a=c.plugins?(Ext.isArray(c.plugins)?c.plugins.push(d):[c.plugins,d]):d;
        Ext.ux.form.SpinnerField.superclass.constructor.call(this,Ext.apply(c,{
            plugins:a
        }))
    },
    getResizeEl:function(){
        return this.wrap
    },
    getPositionEl:function(){
        return this.wrap
    },
    alignErrorIcon:function(){
        if(this.wrap){
            this.errorIcon.alignTo(this.wrap,"tl-tr",[2,0])
        }
    },
    validateBlur:function(){
        return true
    }
});
Ext.reg("spinnerfield",Ext.ux.form.SpinnerField);
Ext.form.SpinnerField=Ext.ux.form.SpinnerField;
/*
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ux.TabCloseMenu=Ext.extend(Object,{
    closeTabText:"Close Editor...",
    closeOtherTabsText:"Close Other Editors...",
    showCloseAll:true,
    closeAllTabsText:"Close All Tabs",
    constructor:function(a){
        this.editor=a.editor;
        Ext.apply(this,a||{})
    },
    init:function(a){
        this.tabs=a;
        a.on({
            scope:this,
            contextmenu:this.onContextMenu,
            destroy:this.destroy
        })
    },
    destroy:function(){
        Ext.destroy(this.menu);
        delete this.menu;
        delete this.tabs;
        delete this.active
    },
    onContextMenu:function(b,c,g){
        this.editor.tabPanel.activate(c);
        this.active=c;
        var a=this.createMenu(),d=true,h=true,f=a.getComponent("closeall");
        b.items.each(function(){
            if(this.closable){
                d=false;
                if(this!=c){
                    h=false;
                    return false
                }
            }
        });
        a.getComponent("closeothers").setDisabled(h);
        if(f){
            f.setDisabled(d)
        }
        g.stopEvent();
        a.showAt(g.getPoint())
    },
    createMenu:function(){
        var b=this.editor;
        if(!this.menu){
            var a=[{
                itemId:"closeothers",
                text:this.closeOtherTabsText,
                iconCls:"close_other_tabs",
                scope:this,
                handler:this.onCloseOthers
            },"-",{
                text:"Save Editor...",
                iconCls:"query_page_save",
                handler:b.saveCurrentEditor.createDelegate(b,[false])
            },{
                text:"Save Editor As...",
                iconCls:"query_page_save_as",
                handler:b.saveCurrentEditorAs.createDelegate(b,[false])
            },"-",{
                text:"Delete Editor...",
                iconCls:"query_page_delete",
                handler:b.deleteEditorConfirmation
            }];
            this.menu=new Ext.menu.Menu({
                items:a
            })
        }
        return this.menu
    },
    onClose:function(){
        this.tabs.remove(this.active)
    },
    onCloseOthers:function(){
        this.doClose(true)
    },
    onCloseAll:function(){
        this.doClose(false)
    },
    doClose:function(b){
        var a=[];
        this.tabs.items.each(function(c){
            if(c.closable){
                if(!b||c!=this.active){
                    a.push(c)
                }
            }
        },this);
        Ext.each(a,function(c){
            if(!c.saved){
                this.editor.tabPanel.activate(c);
                c.fireEvent("beforeclose",c);
                return false
            }else{
                this.tabs.remove(c)
            }
        },this);
        this.editor.handleEditorChange()
    }
});
Ext.preg("tabclosemenu",Ext.ux.TabCloseMenu);
Ext.override(Ext.form.Field,{
    hideItem:function(){
        this.getEl().up("div.x-form-item").addClass("hide")
    },
    showItem:function(){
        this.formItem.removeClass("x-hide-"+this.hideMode)
    },
    setFieldLabel:function(c){
        var b=this.el.findParent("div.x-form-item",3,true);
        var a=b.first("label.x-form-item-label");
        a.update(c)
    }
});
Dbl.ServerAddForm=function(a){
    this.grid=Ext.getCmp("server-connection-grid");
    var d=this.getTopButtonPanel();
    var b=this.getBottomButtonPanel();
    var f=this.createTriggerField();
    var c=this.createChangePassButton();
    var e=this.createDatabaseComboBox();
    this.items=[{
        fieldLabel:"Connection",
        name:"connection_id",
        id:"conn_id",
        emptyText:"Untitled",
        allowBlank:false,
        width:"156px"
    },new Ext.form.ComboBox({
        store:new Ext.data.SimpleStore({
            fields:["database"],
            data:[["mysql"],["sybase"]]
        }),
        value:"mysql",
        displayField:"database",
        typeAhead:true,
        forceSelection:true,
        selectOnFocus:true,
        mode:"local",
        triggerAction:"all",
        emptyText:"Select a database type",
        hidden:true,
        name:"type",
        allowBlank:false
    }),{
        fieldLabel:"Host",
        name:"host",
        value:"localhost",
        allowBlank:false,
        width:"156px"
    },{
        fieldLabel:"Port",
        name:"port",
        value:"3306",
        allowBlank:false,
        width:"156px"
    },{
        fieldLabel:"Username",
        name:"user",
        allowBlank:false,
        width:"156px"
    },f,c,{
        xtype:"checkbox",
        boxLabel:"Save Password",
        name:"save_password",
        checked:true
    },e,{
        xtype:"hidden",
        name:"actual_connection_id",
        value:a?a.data.connection_id:""
    },this.getTestButtonPanel()];
    Dbl.ServerAddForm.superclass.constructor.call(this,{
        url:"add-server.php",
        bodyStyle:"padding: 5px;",
        frame:true,
        autoWidth:true,
        id:"server-form",
        labelWidth:75,
        defaultType:"textfield"
    })
};
    
Ext.grid.RowSelectionModel.override({
    getSelectedIndex:function(){
        return this.grid.store.indexOf(this.selections.itemAt(0))
    }
});
Ext.extend(Dbl.ServerAddForm,Ext.FormPanel,{
    createDatabaseComboBox:function(){
        var a=new Ext.form.ComboBox({
            id:"connection_database",
            store:Dblite.databaseComboStore,
            displayField:"database",
            typeAhead:true,
            selectOnFocus:true,
            mode:"local",
            triggerAction:"all",
            emptyText:"Select a database",
            fieldLabel:"Database",
            name:"database",
            listeners:{
                focus:function(){
                    var d={};
                    
                    var c=Ext.getCmp("server-connection-grid").getSelectionModel().getSelected();
                    if(c&&c.data.untitled){
                        var b=Ext.getCmp("server-form").getForm().getFieldValues();
                        d.connection_name=b.connection_id;
                        d.host=b.host;
                        d.port=b.port;
                        d.user=b.user;
                        d.password=b.password
                    }else{
                        d.connection_name=c.data.connection_id
                    }
                    Dblite.databaseComboStore.loadData("");
                    Server.sendCommand("connection.get_database_list",d,function(g){
                        var f=new Array();
                        for(var e=0;e<g.length;e++){
                            f.push([g[e]])
                        }
                        Dblite.databaseComboStore.loadData(f)
                    },function(){
                        Dblite.databaseComboStore.loadData("")
                    })
                }
            }
        });
        return a
    },
    createTriggerField:function(){
        var a=new Ext.form.TriggerField({
            fieldLabel:"Password",
            id:"connection_password_trigger",
            name:"password",
            inputType:"password",
            width:165,
            hideParent:true,
            hideMode:"display",
            hideTrigger:(Explorer.windowType=="add")?true:false,
            disabledClass:"editPass-disabled",
            triggerConfig:{
                tag:"img",
                src:"app/images/icons/close-16.png",
                cls:"x-form-trigger "+this.triggerClass
            }
        });
        a.onTriggerClick=this.cancelChangePassword;
        a.on("disable",function(){
            this.isDisabled=true
        });
        a.on("enable",function(){
            this.isDisabled=false
        });
        a.on("render",function(){
            this.disable()
        });
        return a
    },
    createChangePassButton:function(){
        var a={
            id:"connection_password_button",
            fieldLabel:"Password",
            width:"164",
            xtype:"button",
            text:"Change",
            handler:this.handleChangePassword
        };
        
        return a
    },
    handleChangePassword:function(c){
        var b=Ext.getCmp("connection_password_button");
        var a=Ext.getCmp("connection_password_trigger");
        Global.hideItem(b);
        Global.showItem(a)
    },
    cancelChangePassword:function(){
        var b=Ext.getCmp("connection_password_button");
        var a=Ext.getCmp("connection_password_trigger");
        Global.hideItem(a);
        Global.showItem(b)
    },
    hideItem:function(a){
        a.getEl().up("div.x-form-item").addClass("hide")
    },
    testConnection:function(){
        Dbl.Utils.showWaitMask();
        var a=Ext.getCmp("server-form").getForm().getFieldValues();
        Server.sendCommand("connection.test_server_connection",{
            type:a.type,
            host:a.host,
            port:a.port,
            user:a.user,
            password:a.password,
            database:a.database,
            testConnection:1
        },function(b){
            Dbl.Utils.hideWaitMask();
            if(b.success){
                Dbl.Utils.showInfoMsg("Connection successful",document.body)
            }else{
                if(!b.success){
                    var c=b.msg?b.msg:"Connection failed!";
                    Dbl.Utils.showErrorMsg(c,document.body)
                }
            }
        },function(b){
            Dbl.Utils.hideWaitMask();
            var c=b.msg?b.msg:b;
            Dbl.Utils.showErrorMsg(c,document.body)
        })
    },
    newConnection:function(){
        var f=Ext.getCmp("add-server-win");
        f.newButton.disable();
        f.connectButton.enable();
        f.saveButton.enable();
        f.delButton.enable();
        this.handleChangePassword();
        Explorer.windowType="add";
        var e=0;
        var c=this.grid;
        var b=c.store;
        b.each(function(k){
            if(k.data.connection_id!=null){
                if(k.data.connection_id.match(/Untitled/)){
                    var j=k.data.connection_id.split("-");
                    if(j[1]&&parseInt(j[1])>e){
                        e=parseInt(j[1])
                    }
                }
            }
        });
        e++;
        var g={
            connection_id:"Untitled-"+e,
            type:"mysql",
            host:"localhost",
            user:"root",
            database:"",
            port:"3306",
            password:"",
            save_password:true,
            untitled:true
        };

        var d=b.getCount();
        var a=new b.recordType(g);
        b.insert(d,a);
        var h=c.getSelectionModel();
        h.selectRow(d);
        Ext.getCmp("server-panel").setTitle("Add New Connection");
        Ext.getCmp("add-server-win").focus();
        Ext.getCmp("conn_id").focus(true);
        return
    },
    showSaveConnectionMsg:function(e,a,c,d,f){
        var b=Ext.getCmp("server-connection-grid");
        Ext.Msg.show({
            id:"connect_message",
            title:"Save Changes?",
            msg:e,
            buttons:Ext.Msg.YESNO,
            buttonText:Ext.MessageBox.buttonText.yes=a,
            buttonText:Ext.MessageBox.buttonText.no=c,
            fn:function(g){
                if(g=="yes"){
                    var h=Ext.getCmp("server-form");
                    h.addUpdateConnection(d)
                }else{
                    if(f){
                        Ext.getCmp("add-server-win").newButton.enable();
                        f()
                    }
                }
            },
            animEl:"add-server-win",
            icon:Ext.MessageBox.QUESTION
        })
    },
    connectConnection:function(d){
        var b=Ext.getCmp("server-connection-grid");
        var h=b.getSelectionModel();
        var f=h.getSelected();
        var c=Ext.getCmp("server-form");
        var a=c.getForm().getFieldValues();
        if(f.data.untitled||(f.data.database!=a.database)){
            c.showSaveConnectionMsg(Messages.getMsg("save_and_connect"),"Save & Connect","Cancel",function(){
                Explorer.connectionChanged(a.connection_id,a.database);
                Dblite.refreshServerList();
                Ext.getCmp("add-server-win").hide()
            })
        }else{
            var g=b.getSelectionModel().getSelectedIndex();
            b.connectTo(b,g,d)
        }
    },
    addUpdateConnection:function(e){
        var b=Ext.getCmp("server-connection-grid");
        var c=Ext.getCmp("server-form").getForm();
        var a=c.getFieldValues();
        if(!a.connection_id||!a.host||!a.port||!a.user){
            Dbl.Utils.showErrorMsg(Messages.getMsg("empty_form_fields"),document.body);
            return false
        }
        Dbl.Utils.showWaitMask();
        var d={
            saved_connection_id:a.connection_id,
            connection_type:a.type,
            connection_host:a.host,
            connection_port:a.port,
            connection_user:a.user,
            save_password:a.save_password?true:false,
            connection_database:a.database,
            actual_connection_id:a.actual_connection_id
        };
        
        if(Ext.getCmp("connection_password_trigger").isVisible&&a.save_password){
            d.connection_password=a.password
        }
        Server.sendCommand("connection.add_edit_server_connection",d,function(f){
            Dbl.Utils.hideWaitMask();
            Ext.getCmp("add-server-win").newButton.enable();
            Dblite.refreshServerList(function(){
                b.selectSavedRow();
                if(e){
                    e()
                }
            })
        },function(g){
            Dbl.Utils.hideWaitMask();
            var f=g.msg?g.msg:g;
            Dbl.Utils.showErrorMsg(f,document.body)
        })
    },
    deleteConnection:function(){
        var b=Ext.getCmp("server-connection-grid");
        var c=b.getSelectionModel().getSelected();
        if(!c){
            return
        }
        Dbl.Utils.showWaitMask();
        if(c.data.untitled){
            Ext.getCmp("server-connection-grid").store.remove(c);
            b.getSelectionModel().selectFirstRow();
            b.updateButtonsStatus();
            Dbl.Utils.showInfoMsg(Messages.getMsg("connection_delete_success"),document.body);
            Ext.getCmp("add-server-win").newButton.enable();
            Dbl.Utils.hideWaitMask();
            return
        }
        var a=Ext.getCmp("server-form").getForm().getFieldValues();
        Server.sendCommand("connection.delete_server_connection",{
            connection_id:a.connection_id
        },function(d){
            Dblite.refreshServerList(function(f){
                b.getSelectionModel().selectFirstRow();
                b.updateButtonsStatus();
                Dbl.Utils.hideWaitMask();
                Dbl.Utils.showInfoMsg(f.msg,document.body);
                var e=b.getSelectionModel().getSelected();
                if(!e){
                    Ext.getCmp("server-panel").setTitle("Add New Connection");
                    Ext.getCmp("server-connections").setValue("");
                    Server.serverChanged("");
                    Explorer.reset()
                }else{
                    Ext.getCmp("server-connections").setValue(e.data.connection_id);
                    Server.serverChanged(e.data.connection_id,e.data.database);
                    Explorer.reset();
                    Explorer.loadExplorerData()
                }
            })
        },function(e){
            Dbl.Utils.hideWaitMask();
            var d=e.msg?e.msg:e;
            Dbl.Utils.showErrorMsg(d,document.body)
        })
    },
    closeServerWindow:function(b){
        var a=Ext.getCmp("server-connection-grid");
        var c=a.getSelectionModel().getSelected();
        if(c&&c.data.untitled){
            Ext.getCmp("server-form").showSaveConnectionMsg(Messages.getMsg("save_connection",[c.data.connection_id]),"Yes","No",function(){
                Ext.getCmp("add-server-win").hide()
            },function(){
                Ext.getCmp("server-connection-grid").store.remove(c);
                Ext.getCmp("server-form").getForm().reset();
                Ext.getCmp("server-panel").setTitle("Add New Connection");
                Ext.getCmp("add-server-win").hide()
            });
            return false
        }else{
            if(!b){
                return
            }else{
                Ext.getCmp("add-server-win").hide()
            }
        }
    },
    getButtons:function(){
        return[this.getTopButtonPanel(),"->",this.getBottomButtonPanel()]
    },
    getTestButtonPanel:function(){
        return new Ext.ButtonGroup({
            layout:"hbox",
            id:"test_btn_grp",
            width:250,
            items:[{
                text:"Test",
                id:"test_btn",
                ref:"../testButton",
                width:50,
                margins:"10 0 0 195",
                handler:this.testConnection,
                scope:this
            }],
            frame:false
        })
    },
    getTopButtonPanel:function(){
        return[{
            id:"new_btn",
            text:"New",
            ref:"../newButton",
            width:50,
            margins:"0 10 0 0",
            handler:this.newConnection,
            scope:this
        },{
            id:"del_btn",
            text:"Delete",
            ref:"../delButton",
            width:50,
            margins:"0 10 0 0",
            handler:this.deleteConnection,
            scope:this
        }]
    },
    getBottomButtonPanel:function(){
        return buttons=[{
            id:"connect_btn",
            text:"Connect",
            width:50,
            ref:"../connectButton",
            handler:this.connectConnection
        },{
            id:"save_btn",
            text:"Save",
            ref:"../saveButton",
            width:50,
            margins:"0 10 0 0",
            handler:function(){
                Ext.getCmp("server-form").addUpdateConnection(function(){
                    Dbl.Utils.hideWaitMask();
                    Dbl.Utils.showInfoMsg(Messages.getMsg("connection_save_success"),"add-server-win")
                })
            }
        },{
            text:"Close",
            width:50,
            id:"cancel_btn",
            margins:"0 0 0 0",
            handler:this.closeServerWindow
        }]
    }
});
var Global={
    hideItem:function(a){
        a.getEl().up("div.x-form-item").addClass("hide");
        a.isVisible=false
    },
    showItem:function(a){
        a.getEl().up("div.x-form-item").removeClass("hide");
        a.isVisible=true
    }
};

Dbl.ServerGrid=function(){
    var a=this;
    this.store=Dblite.connectionStore;
    this.columns=[{
        header:"Connection",
        id:"connection_id",
        sortable:true
    },{
        header:"Type",
        hidden:true
    },{
        header:"Host",
        hidden:true
    },{
        header:"User",
        hidden:true
    },{
        header:"Database",
        hidden:true
    },{
        header:"Port",
        hidden:true
    },{
        header:"Password",
        hidden:true
    },{
        header:"savePassword",
        hidden:true
    }];
    this.sm=new Ext.grid.RowSelectionModel({
        singleSelect:true,
        listeners:{
            beforerowselect:function(f,e,d,c){
                var b=a.getSelectionModel().getSelected();
                if(b&&b.data.untitled){
                    Ext.getCmp("server-form").showSaveConnectionMsg(Messages.getMsg("save_connection",[b.data.connection_id]),"Save","Cancel",function(){
                        Dbl.Utils.showInfoMsg(Messages.getMsg("connection_save_success"),"add-server-win")
                    },function(){
                        a.store.remove(b);
                        Ext.getCmp("server-form").getForm().reset();
                        Ext.getCmp("server-panel").setTitle("Add New Connection");
                        a.getSelectionModel().selectRow(e)
                    });
                    return false
                }
            },
            rowselect:function(d,c,b){
                Ext.getCmp("server-panel").setTitle("Edit Connection");
                Ext.getCmp("server-panel").removeAll();
                Ext.getCmp("server-panel").add(new Dbl.ServerAddForm(b,"edit"));
                Ext.getCmp("server-panel").doLayout();
                Ext.getCmp("server-form").getForm().loadRecord(b);
                Ext.getCmp("server-connection-grid").updateButtonsStatus();
                if(Explorer.windowType=="add"){
                    Ext.getCmp("server-form").handleChangePassword()
                }else{
                    Ext.getCmp("server-form").cancelChangePassword()
                }
            }
        }
    });
    Dbl.ServerGrid.superclass.constructor.call(this,{
        id:"server-connection-grid",
        autoExpandColumn:"connection_id",
        viewConfig:{
            scrollOffset:2
        },
        listeners:{
            rowdblclick:this.handleRowDobleClick,
            scope:this
        }
    })
};

Ext.extend(Dbl.ServerGrid,Ext.grid.GridPanel,{
    handleRowDobleClick:function(a,c,b){
        this.connectTo()
    },
    connectTo:function(){
        if(this.isUnsavedRecord()){
            return false
        }
        var a=this.getSelectionModel().getSelected();
        console.log(a.data);
        Explorer.connectionChanged(a.data.connection_id,a.data.database);
        Ext.getCmp("add-server-win").hide();
        Ext.getCmp("server-panel").setTitle("Add New Connection");
        Ext.getCmp("server-form").getForm().reset();
        Dblite.refreshServerList()
    },
    isUnsavedRecord:function(){
        var a=this.getSelectionModel().getSelected();
        if(!a){
            return false
        }
        if(a.data.untitled){
            return true
        }
        return false
    },
    updateButtonsStatus:function(){
        var b=Ext.getCmp("server-connection-grid");
        var c=Ext.getCmp("server-form");
        var d=Ext.getCmp("add-server-win");
        var a=b.store.getCount();
        if(a<1){
            d.connectButton.disable();
            d.saveButton.disable();
            d.delButton.disable();
            Ext.getCmp("test_btn_grp").get("test_btn").disable();
            c.getForm().reset();
            c.disable()
        }else{
            d.connectButton.enable();
            d.saveButton.enable();
            d.delButton.enable();
            Ext.getCmp("test_btn_grp").get("test_btn").enable();
            c.enable();
            b.doLayout()
        }
    },
    selectSavedRow:function(){
        var d=Ext.getCmp("server-form").getForm();
        var a=d.getFieldValues();
        var c=Ext.getCmp("server-connection-grid");
        var b=c.store;
        b.each(function(e){
            if(e.data.connection_id==a.connection_id){
                c.getSelectionModel().selectRecords([e])
            }
        })
    }
});
Dbl.ServerWindow=function(){
    var a=new Dbl.ServerGrid();
    var b=new Dbl.ServerAddForm();
    Dbl.ServerWindow.superclass.constructor.call(this,{
        title:"Manage Connections",
        id:"add-server-win",
        width:470,
        minWidth:470,
        height:340,
        minHeight:340,
        resizable:true,
        plain:true,
        modal:true,
        stateful:true,
        y:100,
        autoScroll:true,
        closeAction:"hide",
        defaultButton:"conn_id",
        layout:"border",
        buttonAlign:"left",
        buttons:b.getButtons(),
        items:[{
            region:"west",
            title:"Saved Connections",
            id:"server-grid",
            width:180,
            minWidth:180,
            border:false,
            split:true,
            layout:"fit",
            items:[a]
        },{
            region:"center",
            title:"Add New Connection",
            id:"server-panel",
            edit:false,
            border:false,
            layout:"fit",
            xtype:"panel",
            items:[b]
        }],
        listeners:{
            afterrender:this.handleAfterRender,
            beforehide:this.handleBeforeHide,
            scope:this
        }
    })
};

Ext.extend(Dbl.ServerWindow,Ext.Window,{
    handleAfterRender:function(){
        Ext.getCmp("conn_id").focus(true)
    },
    handleBeforeHide:function(){
        return Ext.getCmp("server-form").closeServerWindow()
    }
});
Dbl.AddIndexFormPanel=function(){
    var a=[{
        boxLabel:"Unique",
        name:"add_index_form_index_type",
        id:"add_index_form_index_type_unique",
        inputValue:"unique"
    },{
        boxLabel:"Full Text",
        name:"add_index_form_index_type",
        id:"add_index_form_index_type_fullText",
        inputValue:"fullText"
    },{
        boxLabel:"Primary",
        name:"add_index_form_index_type",
        id:"add_index_form_index_type_primary",
        inputValue:"primary",
        listeners:{
            check:{
                fn:function(){
                    var b=Ext.getCmp("add_index_form").getForm().getValues(false);
                    var c=Ext.getCmp("add_index_form_index_name");
                    if(b.add_index_form_index_type=="primary"){
                        c.prevValue=b.add_index_form_index_name;
                        c.setValue("PRIMARY");
                        c.disable()
                    }else{
                        c.setValue(c.prevValue);
                        c.enable()
                    }
                }
            }
        }
    },{
        boxLabel:"None",
        name:"add_index_form_index_type",
        id:"add_index_form_index_type_none",
        inputValue:"none",
        checked:true
    }];
    Dbl.AddIndexFormPanel.superclass.constructor.call(this,{
        id:"add_index_form",
        labelAlign:"top",
        bodyStyle:"padding: 5px",
        defaults:{
            anchor:"100%"
        },
        items:[{
            xtype:"textfield",
            fieldLabel:"Index Name",
            name:"add_index_form_index_name",
            id:"add_index_form_index_name",
            blankText:"Index name is required",
            allowBlank:false
        },{
            xtype:"hidden",
            name:"add_index_form_original_name",
            id:"add_index_form_original_name"
        },{
            xtype:"radiogroup",
            rows:1,
            id:"options_group",
            defaults:{
                anchor:"100%"
            },
            bodyStyle:"padding: 0px; margin: 0px",
            items:a,
            fieldLabel:"Index Options"
        }]
    })
};

Ext.onReady(function(){
    Ext.extend(Dbl.AddIndexFormPanel,Ext.FormPanel,{})
});
Dbl.AddIndexGridPanel=function(c){
    var a=new Ext.ux.CheckColumn({
        header:" ",
        checkOnly:true,
        dataIndex:"included",
        width:20
    });
    for(var b=0;b<c.fields.length;b++){
        if(c.fields[b]=="included"){
            c.fields[b].type="bool";
            c.models[b]=a
        }
    }
    Dbl.AddIndexGridPanel.superclass.constructor.call(this,{
        fields:c.fields,
        data:c.data,
        models:c.models,
        autoExpandColumn:"Name",
        viewConfig:{
            forceFit:true
        },
        id:"add_index_grid",
        height:180,
        autoScroll:true,
        fbar:["<b>Note:</b> To reorder just change the order of the rows via drag & drop"],
        enableDragDrop:true,
        ddGroup:"mygridDD",
        plugins:[a],
        listeners:{
            render:{
                scope:this,
                fn:function(e){
                    var d=new Ext.dd.DropTarget(e.container,{
                        ddGroup:"mygridDD",
                        copy:false,
                        notifyDrop:function(f,l,k){
                            var j=e.store;
                            var m=e.getSelectionModel();
                            var h=m.getSelections();
                            if(f.getDragData(l)){
                                var g=f.getDragData(l).rowIndex;
                                if(typeof(g)!="undefined"){
                                    for(b=0;b<h.length;b++){
                                        j.remove(j.getById(h[b].id))
                                    }
                                    j.insert(g,k.selections);
                                    m.clearSelections()
                                }
                            }
                        }
                    })
                }
            }
        }
    })
};

Ext.onReady(function(){
    Ext.extend(Dbl.AddIndexGridPanel,Dbl.ListViewPanel,{})
});
Dbl.AddIndexPanel=function(f){
    var a=new Dbl.AddIndexGridPanel(f);
    var b=new Dbl.AddIndexFormPanel();
    if(f.editMode){
        var k=Ext.getCmp("manage_indexes_grid").getSelectionModel().getSelected().data;
        var l=k.indexName;
        var g=b.getForm();
        g.findField("add_index_form_index_name").setValue(l);
        g.findField("add_index_form_original_name").setValue(l);
        var h;
        if(l=="PRIMARY"){
            h="primary"
        }else{
            if(k.unique==true){
                h="unique"
            }else{
                if(k.fullText==true){
                    h="fullText"
                }else{
                    h="none"
                }
            }
        }
        var j="add_index_form_index_type_"+h;
        Ext.getCmp("options_group").setValue(j,true);
        var c=k.columns.split(",").reverse();
        for(var e=0;e<c.length;e++){
            var m=gridPanel.getStore().find("Name",c[e]);
            var d=gridPanel.getStore().getAt(m);
            d.set("included",true);
            gridPanel.getStore().remove(d);
            gridPanel.getStore().insert(0,d)
        }
    }
    Dbl.AddIndexPanel.superclass.constructor.call(this,{
        id:"add_index_panel",
        split:true,
        border:false,
        header:false,
        tbar:this.buildTopToolbar(f.editMode),
        items:[b,a]
    })
};

Ext.extend(Dbl.AddIndexPanel,Ext.Panel,{
    buildTopToolbar:function(a){
        return[{
            text:a?"submit":"add"
        },{
            text:"cancel"
        }]
    }
});
Dbl.BackupDbPanel=function(c){
    var a=new Ext.data.ArrayStore({
        fields:["value"],
        data:c.result,
        sortInfo:{
            field:"value",
            direction:"ASC"
        }
    });
    var b=(c.current_table)?1:0;
    Dbl.BackupDbPanel.superclass.constructor.call(this,{
        id:"backup_db",
        region:"center",
        xtype:"panel",
        layout:"fit",
        items:[this.createForm(c.curr_db,a,b)]
    })
};

Ext.extend(Dbl.BackupDbPanel,Ext.Panel,{
    createForm:function(d,a,c){
        var b=new Ext.data.ArrayStore({
            fields:["value"],
            data:[],
        });
        return new Ext.FormPanel({
            fileUpload:true,
            frame:true,
            id:"backup_form",
            labelAlign:"top",
            bodyStyle:"padding: 5px",
            defaults:{
                anchor:"100%"
            },
            items:[{
                layout:"column",
                items:[{
                    columnWidth:0.25,
                    items:this.renderBackupDbExportOptions()
                },{
                    columnWidth:0.75,
                    bodyStyle:"padding-left: 10px;",
                    layout:"form",
                    labelWidth:50,
                    defaults:{
                        anchor:"100%"
                    },
                    items:this.renderBackupDbOptions(d,c)
                }]
            },{
                xtype:"hidden",
                name:"selected_db",
                value:d
            },{
                xtype:"hidden",
                name:"connection_id",
                value:Server.connection_id
            },{
                xtype:"itemselector",
                name:"tables_lists",
                imagePath:"../app/images/itemselector/",
                bodyStyle:"padding: 0px 10px",
                availableLegend:"Available tables",
                selectedLegend:"Selected tables",
                multiselects:[{
                    width:280,
                    height:135,
                    store:b,
                    displayField:"value",
                    valueField:"value"
                },{
                    width:280,
                    height:135,
                    store:a,
                    displayField:"value",
                    valueField:"value"
                }]
            }],
            buttons:[{
                text:"Export",
                handler:function(){
                    var e=Ext.getCmp("backup_form").getForm();
                    if(e.getValues().tables_lists==""){
                        Dbl.Utils.showErrorMsg(Messages.getMsg("backupdb_notable_selected"),"");
                        return false
                    }
                    e.getEl().dom.action=MAIN_URL+"/cmd.php?command=export.export_as_sql&form=1";
                    e.getEl().dom.method="POST";
                    e.getEl().dom.target="download_frame";
                    e.submit()
                }
            }]
        })
    },
    renderBackupDbExportOptions:function(){
        return[{
            xtype:"tbtext",
            text:"<b>Exporting as SQL</b>",
            anchor:"95%",
            style:{
                margin:"3px 0px 10px"
            }
        },{
            xtype:"hidden",
            name:"export_type",
            value:"sql"
        },Dbl.Utils.loadExportDataOptions()]
    },
    renderBackupDbOptions:function(b,a){
        var c=this.loadCreateDbOptions(a);
        return[{
            xtype:"tbtext",
            text:"Selected DB: <b>"+b+"</b>",
            anchor:"95%",
            style:{
                margin:"3px 0px 10px"
            }
        },{
            xtype:"fieldset",
            title:"Options",
            id:"options_set",
            bodyStyle:"padding: 0px 10px",
            items:[{
                xtype:"checkboxgroup",
                columns:2,
                id:"options_group",
                defaults:{
                    anchor:"100%"
                },
                items:c
            }]
        },{
            xtype:"fieldset",
            title:"InnoDB options",
            collapsible:true,
            collapsed:true,
            bodyStyle:"padding: 0px 10px",
            items:[{
                xtype:"checkboxgroup",
                columns:1,
                id:"innodb_options",
                defaults:{
                    anchor:"100%"
                },
                items:[{
                    boxLabel:"Disable Foreign key checks",
                    name:"options[]",
                    inputValue:"disable_foreign_keys"
                }]
            }]
        }]
    },
    loadCreateDbOptions:function(a){
        var b={
            boxLabel:'Add "CREATE DATABASE"',
            name:"options[]",
            inputValue:"create_db",
            checked:true
        };
    
        var e={
            boxLabel:'Add "DROP DATABASE"',
            name:"options[]",
            inputValue:"drop_db",
            checked:true
        };
    
        var j={
            boxLabel:'Add "DROP TABLE"',
            name:"options[]",
            inputValue:"drop_table",
            checked:true
        };
    
        var d={
            boxLabel:'Add "COMMENTS"',
            name:"options[]",
            inputValue:"add_comments",
            checked:true
        };
    
        var h={
            boxLabel:"Complete inserts",
            name:"options[]",
            inputValue:"complete_insert",
            checked:true
        };
    
        var c={
            boxLabel:"Extended inserts",
            name:"options[]",
            inputValue:"extended_insert",
            checked:true
        };
    
        var g={
            boxLabel:'Add "VIEWS/EVENTS/TRIGGERS and PROCEDURE/FUNCTION ROUTINES"',
            name:"options[]",
            inputValue:"add_proc_func"
        };
    
        var f={
            boxLabel:'Add "AUTO_INCREMENT" value',
            name:"options[]",
            inputValue:"add_autoincr",
            checked:true
        };
    
        if(a){
            return[j,d,h,c,f]
        }else{
            return[b,e,j,d,h,c,g,f]
        }
    }
});
Dbl.ConnectionPasswordPanel=function(b,d){
    var a=[{
        fieldLabel:"Password for "+b,
        name:"password",
        id:"connpassword",
        inputType:"password"
    },{
        xtype:"hidden",
        name:"connection",
        value:b
    },{
        xtype:"hidden",
        name:"database",
        value:d
    }];
    var c=[{
        text:"Ok",
        handler:this.getAndSavePassword,
        scope:this
    },{
        text:"Cancel",
        handler:this.connectServer.createCallback(b,d),
        scope:this
    }];
    Dbl.ConnectionPasswordPanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"connection_password_form",
        frame:true,
        border:false,
        labelWidth:150,
        defaultType:"textfield",
        defaults:{
            width:150
        },
        items:a,
        buttons:c
    })
};
    
Ext.extend(Dbl.ConnectionPasswordPanel,Ext.form.FormPanel,{
    getAndSavePassword:function(){
        var a=Ext.getCmp("connection_password_form").getForm().getFieldValues();
        console.log(a);
        if(a.connection){
            Server.sendCommand("connection.temp_save_password",{
                newConnectionId:a.connection,
                password:a.password,
                scope:this
            },function(b){
                this.connectServer(a.connection,a.database)
            })
        }
    },
    connectServer:function(a,b){
        Ext.getCmp("connection_password_window").close();
        Explorer.proceedServerChange(a,b)
    }
});
Dbl.ContextMenuWindow=function(a){
    Ext.applyIf(a,{
        width:300,
        height:200,
        resizable:false,
        layout:"fit",
        modal:true,
        plain:true,
        stateful:true
    });
    Dbl.ContextMenuWindow.superclass.constructor.call(this,a)
};
    
Ext.extend(Dbl.ContextMenuWindow,Ext.Window,{});
Dbl.CreateDbPanel=function(b,d){
    var a=[{
        fieldLabel:"Enter new database name",
        name:"database_name",
        allowBlank:false,
        style:{
            marginBottom:"15px"
        }
    },new Ext.form.ComboBox({
        store:new Ext.data.SimpleStore({
            fields:["charset"],
            data:b
        }),
        displayField:"charset",
        typeAhead:true,
        forceSelection:true,
        selectOnFocus:true,
        mode:"local",
        triggerAction:"all",
        fieldLabel:"Database charset",
        name:"charset",
        emptyText:"[Default]"
    }),new Ext.form.ComboBox({
        store:new Ext.data.SimpleStore({
            fields:["collation"],
            data:d
        }),
        displayField:"collation",
        fieldLabel:"Database collation",
        typeAhead:true,
        forceSelection:true,
        selectOnFocus:true,
        mode:"local",
        triggerAction:"all",
        name:"collation",
        emptyText:"[Default]"
    })];
    var c=[{
        text:"create",
        handler:this.createDatabase
    },{
        text:"cancel",
        handler:this.cancelDBCreation
    }];
    Dbl.CreateDbPanel.superclass.constructor.call(this,{
        id:"database-form",
        labelWidth:150,
        frame:true,
        defaultType:"textfield",
        defaults:{
            width:150
        },
        items:a,
        buttons:c
    })
};

Ext.extend(Dbl.CreateDbPanel,Ext.form.FormPanel,{
    createDatabase:function(){
        var a=Ext.getCmp("database-form").getForm().getFieldValues();
        Database.sendCommand("create_database",{
            dbname:a.database_name,
            charset:a.charset,
            collation:a.collation
        },function(b){
            Ext.getCmp("create_db_window").close();
            Explorer.explorerPanel.removeAll();
            Explorer.loadExplorerData(a.database_name)
        })
    },
    cancelDBCreation:function(){
        Ext.getCmp("create_db_window").close()
    }
});
Dbl.CreateFunctionPanel=function(b){
    var a=[{
        fieldLabel:"New function name",
        name:"functionname",
        allowBlank:false,
        xtype:"textfield",
        vtype:"alphanum"
    },{
        name:"database",
        xtype:"hidden",
        value:Explorer.selectedDatabase
    }];
    var c=[{
        text:"create",
        handler:this.getFunctionName,
        scope:this
    },{
        text:"cancel",
        handler:this.cancelCreateFunction,
        scope:this
    }];
    Dbl.CreateFunctionPanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"create_function_form",
        frame:true,
        labelWidth:120,
        defaults:{
            width:150
        },
        items:a,
        buttons:c
    })
};
    
Ext.extend(Dbl.CreateFunctionPanel,Ext.form.FormPanel,{
    getFunctionName:function(){
        var a=Ext.getCmp("create_function_form").getForm().getFieldValues();
        var d=a.functionname;
        var b=a.database;
        if(d&&b){
            var c=this.getFunctionSQL(d,b);
            this.addCreateFunctionEditor(d,c)
        }
    },
    getFunctionSQL:function(d,b){
        var e="DROP FUNCTION IF EXISTS `"+b+"`.`"+d+"`"+Editor.defaultSQLDelimiter+"\n\n";
        var c="CREATE FUNCTION `"+b+"`.`"+d+"`() \nRETURNS type \n/*LANGUAGE SQL \n| [NOT] DETERMINISTIC \n| { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA } \n| SQL SECURITY { DEFINER | INVOKER } \n| COMMENT 'string'*/ \n";
        var a="BEGIN\n\nEND"+Editor.defaultSQLDelimiter+"\n\n";
        return e+c+a
    },
    addCreateFunctionEditor:function(c,b){
        Editor.browserPanel.selectedQueryFolder="";
        Editor.browserPanel.selectedQueryFile="";
        Editor.addEditor(b);
        var a=Editor.tabPanel.getActiveTab();
        a.editortype="function_editor";
        this.cancelCreateFunction()
    },
    cancelCreateFunction:function(){
        Ext.getCmp("create_function_window").close()
    }
});
Dbl.CreateProcedurePanel=function(b){
    var a=[{
        fieldLabel:"New procedure name",
        name:"procedurename",
        allowBlank:false,
        xtype:"textfield",
        vtype:"alphanum"
    },{
        name:"database",
        xtype:"hidden",
        value:Explorer.selectedDatabase
    }];
    var c=[{
        text:"create",
        handler:this.getProcedureName,
        scope:this
    },{
        text:"cancel",
        handler:this.cancelCreateProcedure,
        scope:this
    }];
    Dbl.CreateProcedurePanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"create_procedure_form",
        frame:true,
        labelWidth:150,
        defaults:{
            width:150
        },
        items:a,
        buttons:c
    })
};
    
Ext.extend(Dbl.CreateProcedurePanel,Ext.form.FormPanel,{
    getProcedureName:function(){
        var b=Ext.getCmp("create_procedure_form").getForm().getFieldValues();
        var a=b.procedurename;
        var d=b.database;
        if(a&&d){
            var c=this.getProcedureSQL(a,d);
            this.addCreateProcedureEditor(a,c)
        }
    },
    getProcedureSQL:function(a,d){
        var b="DROP PROCEDURE IF EXISTS `"+d+"`.`"+a+"`"+Editor.defaultSQLDelimiter+"\n\n ";
        var c="CREATE PROCEDURE `"+d+"`.`"+a+"`() \n/*LANGUAGE SQL \n | [NOT] DETERMINISTIC \n | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }\n | SQL SECURITY { DEFINER | INVOKER } \n | COMMENT 'string'*/ \n BEGIN\n\n END"+Editor.defaultSQLDelimiter+"\n\n";
        return b+c
    },
    addCreateProcedureEditor:function(a,b){
        Editor.browserPanel.selectedQueryFolder="";
        Editor.browserPanel.selectedQueryFile="";
        Editor.addEditor(b);
        var c=Editor.tabPanel.getActiveTab();
        c.editortype="procedure_editor";
        this.cancelCreateProcedure()
    },
    cancelCreateProcedure:function(){
        Ext.getCmp("create_procedure_window").close()
    }
});
Dbl.CreateTableGridPanel=function(f){
    this.gridColumns=f.column_names;
    f=this.createColumns(f);
    var b=new Ext.data.SimpleStore({
        fields:f.fields
    });
    b.on("load",function(j,h,k){
        Dbl.Utils.removeLoadingIcon()
    },this);
    b.loadData(f.rows);
    var a=new Ext.grid.CheckboxSelectionModel({
        header:"",
        checkOnly:true,
        init:function(h){
            this.grid=h;
            this.initEvents()
        },
        listeners:{
            rowdeselect:this.handleRowDeselect
        }
    });
    var g=new Array(a);
    var g=g.concat(f.columns);
    var d=new Ext.grid.ColumnModel({
        defaults:{},
        columns:g
    });
    if(Dbl.UserActivity.getValue("table_type")=="view"){
        for(var c=1;c<d.getColumnCount();c++){
            var e=d.columns[c];
            e.editor=""
        }
    }
    Dbl.CreateTableGridPanel.superclass.constructor.call(this,{
        id:(f.create_table)?("create_table_grid"):("alter_table_grid"),
        alter_table:(f.alter_table)?true:false,
        store:b,
        height:432,
        cm:d,
        sm:a,
        columnLines:true,
        clicksToEdit:1,
        viewConfig:{},
        trackMouseOver:true,
        border:false,
        plugins:[this.primaryKeyColumn,this.notNullColumn,this.unsignedColumn,this.autoIncrColumn,this.zerofillColumn],
        listeners:{
            viewready:this.autoSizeColumns,
            afterrender:this.selectTableColumn,
            beforeedit:this.handleBeforeEdit,
            afteredit:this.handleAfterEdit,
            scope:this
        }
    })
};

Ext.extend(Dbl.CreateTableGridPanel,Ext.grid.EditorGridPanel,{
    gridColumns:new Array(),
    changedFieldsOld:new Array(),
    changedFieldsNew:new Array(),
    modifiedFields:new Array(),
    deletedFields:new Array(),
    addedFields:new Array(),
    autoSizeColumns:function(){
        for(var a=1;a<this.colModel.getColumnCount();a++){
            this.autoSizeColumn(a)
        }
        this.view.refresh(true)
    },
    autoSizeColumn:function(f,a){
        var d=this.view.getHeaderCell(f).firstChild.scrollWidth;
        for(var e=0;e<this.store.getCount();e++){
            var b=this.view.getCell(e,f).firstChild.scrollWidth;
            d=Math.max(d,b);
            if(a&&d>a){
                d=a
            }
        }
        if(!d){
            return
        }
        this.colModel.setColumnWidth(f,d);
        return d
    },
    getComboBoxEditor:function(b,a){
        return new Ext.form.ComboBox({
            store:new Ext.data.SimpleStore({
                fields:[b],
                data:a
            }),
            displayField:b,
            typeAhead:true,
            forceSelection:true,
            selectOnFocus:true,
            mode:"local",
            triggerAction:"all",
            name:b
        })
    },
    createColumns:function(c){
        this.primaryKeyColumn=new Ext.ux.CheckColumn({
            header:"Primary Key",
            dataIndex:"primary_key",
            width:70
        });
        this.notNullColumn=new Ext.ux.CheckColumn({
            header:"Not Null",
            dataIndex:"not_null",
            width:70
        });
        this.unsignedColumn=new Ext.ux.CheckColumn({
            header:"Unsigned",
            dataIndex:"unsigned",
            width:70
        });
        this.autoIncrColumn=new Ext.ux.CheckColumn({
            header:"Auto Incr",
            dataIndex:"auto_incr",
            width:70
        });
        this.zerofillColumn=new Ext.ux.CheckColumn({
            header:"Zerofill",
            dataIndex:"zerofill",
            width:70
        });
        c.fields=new Array();
        c.columns=new Array();
        for(var b=0;b<c.column_names.length;b++){
            var a=c.column_names[b];
            switch(a){
                case"field_name":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
            
                    c.columns[b]={
                        header:"Field name",
                        id:a,
                        dataIndex:a,
                        editor:new Ext.form.TextField({
                            name:a
                        })
                    };
                
                    break;
                case"datatype":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
            
                    c.columns[b]={
                        header:"Datatype",
                        id:a,
                        dataIndex:a,
                        editor:Dbl.Utils.getComboBoxEditor(a,c.datatypes)
                    };
                
                    break;
                case"length":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
            
                    c.columns[b]={
                        header:"Length",
                        id:a,
                        dataIndex:a,
                        editor:new Ext.form.TextField({
                            name:a
                        })
                    };
                
                    break;
                case"default_value":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
            
                    c.columns[b]={
                        header:"Default",
                        id:a,
                        dataIndex:a,
                        editor:new Ext.form.TextField({
                            name:a
                        })
                    };
                
                    break;
                case"primary_key":
                    c.fields[b]={
                        name:a,
                        type:"bool"
                    };
            
                    c.columns[b]=this.primaryKeyColumn;
                    break;
                case"not_null":
                    c.fields[b]={
                        name:a,
                        type:"bool"
                    };
            
                    c.columns[b]=this.notNullColumn;
                    break;
                case"unsigned":
                    c.fields[b]={
                        name:a,
                        type:"bool"
                    };
            
                    c.columns[b]=this.unsignedColumn;
                    break;
                case"auto_incr":
                    c.fields[b]={
                        name:a,
                        type:"bool"
                    };
            
                    c.columns[b]=this.autoIncrColumn;
                    break;
                case"zerofill":
                    c.fields[b]={
                        name:a,
                        type:"bool"
                    };
            
                    c.columns[b]=this.zerofillColumn;
                    break;
                case"collation":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
            
                    c.columns[b]={
                        header:"Collation",
                        id:a,
                        dataIndex:a,
                        editor:Dbl.Utils.getComboBoxEditor(a,c.collations)
                    };
                
                    break;
                case"comment":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
            
                    c.columns[b]={
                        header:"Comment",
                        id:a,
                        dataIndex:a,
                        editor:new Ext.form.TextField({
                            name:a
                        })
                    };
                
                    break;
                default:
                    break
            }
        }
        return c
    },
    checkForEdit:function(c,b){
        switch(c){
            case"int":case"smallint":case"mediumint":case"bigint":case"float":case"double":
                var d=new Array("charset","collation");
                break;
            case"bool":case"boolean":
                var d=new Array("length","unsigned","auto_incr","charset","collation");
                break;
            case"date":case"datetime":case"time":case"timestamp":
                var d=new Array("length","unsigned","auto_incr","zerofill","charset","collation");
                break;
            case"varbinary":case"year":case"bit":
                var d=new Array("unsigned","auto_incr","zerofill","charset","collation");
                break;
            case"blob":
                var d=new Array("primary_key","unsigned","auto_incr","zerofill","charset","collation");
                break;
            case"tinyblob":case"mediumblob":case"longblob":
                var d=new Array("length","primary_key","unsigned","auto_incr","zerofill","charset","collation");
                break;
            case"binary":case"decimal":
                var d=new Array("auto_incr","charset","collation");
                break;
            case"char":case"varchar":case"enum":case"set":
                var d=new Array("unsigned","auto_incr","zerofill");
                break;
            case"text":
                var d=new Array("primary_key","unsigned","auto_incr","zerofill");
                break;
            case"tinytext":case"mediumtext":case"longtext":
                var d=new Array("length","primary_key","unsigned","auto_incr","zerofill");
                break;
            case"numeric":
                var d=new Array("unsigned","auto_incr","charset","collation");
                break;
            case"real":
                var d=new Array("unsigned","charset","collation");
                break;
            default:
                var d=new Array()
        }
        var a=d.indexOf(b);
        return ret=(a==-1)?true:false
    },
    handleBeforeEdit:function(b){
        if(b.field!="field_name"){
            if(!b.record.data.field_name){
                return false
            }else{
                if(b.field!="datatype"){
                    var a=this.checkForEdit(b.record.data.datatype,b.field);
                    if(!a){
                        return false
                    }
                }
            }
        }
    },
    handleAfterEdit:function(f){
        this.autoSizeColumns();
        if(f.value==f.originalValue){
            return
        }else{
            if(this.alter_table){
                Ext.getCmp("alter_table_panel").getTopToolbar().get(0).enable()
            }
            if(f.field=="field_name"){
                var c=f.originalValue;
                var b=f.value;
                if(!c||!b){
                    return
                }
                if(this.changedFieldsNew.length){
                    for(var d=0;d<this.changedFieldsNew.length;d++){
                        var a=this.changedFieldsNew[d];
                        if(a.new_col==c){
                            this.changedFieldsNew[d].new_col=b;
                            return
                        }
                    }
                }
                if(this.changedFieldsOld.indexOf(c)==-1){
                    var a={
                        old_col:c,
                        new_col:b
                    };
        
                    this.changedFieldsOld.push(c);
                    this.changedFieldsNew.push(a)
                }
            }else{
                if(this.modifiedFields.indexOf(f.record.data.field_name)==-1){
                    if(this.changedFieldsOld.indexOf(f.record.data.field_name)==-1){
                        this.modifiedFields.push(f.record.data.field_name)
                    }
                }
            }
        }
    },
    addField:function(){
        var d=this.store;
        var b=this.getSelectionModel().getSelections();
        var h="";
        if(b.length>0){
            var g=b[0];
            var e=d.indexOf(g);
            if(e!=-1){
                h=e
            }
        }
        var c=d.getCount();
        var a=new d.recordType({});
        a.new_field=true;
        var f=(b.length>0)?h:c;
        this.stopEditing();
        d.insert(f,a);
        this.startEditing(f,1)
    },
    removeFieldConfirm:function(){
        var b=this;
        var a=b.getSelectionModel().getSelections();
        if(this.store.getCount()==a.length){
            Dbl.Utils.showErrorMsg(Messages.getMsg("table_field_required"));
            return
        }
        if(a.length>0){
            Ext.Msg.show({
                title:"Confirmation",
                msg:Messages.getMsg("drop_columns"),
                buttons:Ext.Msg.YESNO,
                fn:this.removeField,
                animEl:"delete_row",
                icon:Ext.MessageBox.QUESTION,
                scope:b
            })
        }else{
            Dbl.Utils.showErrorMsg(Messages.getMsg("nocolumn_selected"))
        }
    },
    removeField:function(c){
        if(c=="yes"){
            var a=this.getSelectionModel().getSelections();
            for(var b=0;b<a.length;b++){
                var d=a[b].data.field_name;
                this.deletedFields.push(d);
                this.store.remove(a[b]);
                Ext.getCmp("alter_table_panel").getTopToolbar().get(0).enable()
            }
        }else{
            this.getSelectionModel().clearSelections()
        }
    },
    dropColumnConfirm:function(c){
        var b=this;
        var a=b.getSelectionModel().getSelections();
        var d=Explorer.selectedColumn?Explorer.selectedColumn:c;
        if(this.store.getCount()==a.length){
            Dbl.Utils.showErrorMsg(Messages.getMsg("table_field_required"));
            return
        }
        if(a.length>0){
            Ext.Msg.show({
                title:"Confirmation",
                msg:Messages.getMsg("drop_column",[d,Explorer.selectedTable]),
                buttons:Ext.Msg.YESNO,
                fn:this.dropColumn,
                animEl:"delete_row",
                icon:Ext.MessageBox.QUESTION,
                scope:b
            })
        }else{
            Dbl.Utils.showErrorMsg(Messages.getMsg("nofield_selected"))
        }
    },
    dropColumn:function(c){
        if(c=="yes"){
            var a=this.getSelectionModel().getSelections();
            for(var b=0;b<a.length;b++){
                var d=a[b].data.field_name;
                this.deletedFields.push(d);
                this.store.remove(a[b]);
                var e=this.validateDefinition();
                if(e){
                    this.alterTable(true)
                }
            }
        }else{
            this.getSelectionModel().clearSelections();
            Explorer.selectedColumn="";
            Explorer.selectedColumnNodeId=""
        }
    },
    validateDefinitionAndCreateTable:function(){
        var a=this.validateDefinition();
        if(a){
            this.showTableNameWindow()
        }
    },
    validateDefinition:function(){
        var c=this.getStore();
        var a=c.data.items;
        var g=Messages.getMsg("nofield_definitions");
        if(!a.length){
            Dbl.Utils.showErrorMsg(g,"");
            return false
        }else{
            var f=false;
            for(var d=0;d<a.length;d++){
                var b=a[d].data;
                if(b.field_name&&b.datatype){
                    f=true
                }else{
                    if(b.field_name&&!b.datatype){
                        var e=Messages.getMsg("nofield_datatype",[b.field_name]);
                        Dbl.Utils.showErrorMsg(e,"");
                        return false
                    }else{
                        if(!b.field_name&&!b.datatype&&(d==a.length-1)&&!f){
                            Dbl.Utils.showErrorMsg(g,"");
                            return false
                        }
                    }
                }
            }
        }
        return true
    },
    showTableNameWindow:function(){
        var a=new Dbl.ContextMenuWindow({
            title:"Create New Table",
            id:"get_table_name_window",
            width:300,
            height:120,
            resizable:false,
            layout:"border",
            modal:true,
            plain:true,
            stateful:true,
            items:[{
                id:"get_table_name_panel",
                region:"center",
                xtype:"panel",
                layout:"fit",
                border:false,
                items:[new TableNamePanel(this)]
            }]
        });
        a.show()
    },
    createTable:function(c){
        var a=this;
        var b=this.getCreateSQL(c);
        Server.sendCommand("create_table",{
            database:Explorer.selectedDatabase,
            tablename:c,
            table_ddl:b
        },function(d){
            if(d.success){
                Explorer.selectedTable=c;
                Explorer.explorerPanel.removeAll();
                Explorer.loadExplorerData(Explorer.selectedDatabase,Explorer.selectedTable,"table");
                Explorer.selectedNodeType="table";
                Explorer.selectedTable=c;
                Dblite.dataPanel.activate("create_table_panel");
                Ext.getCmp("get_table_name_window").close();
                Ext.Msg.show({
                    title:"Success",
                    msg:d.msg,
                    buttons:Ext.Msg.OK,
                    fn:a.createMoreTableConfirm.createCallback(a),
                    animEl:document.body,
                    icon:Ext.MessageBox.INFO
                })
            }else{
                if(!d.success){
                    Dbl.Utils.showErrorMsg(d.msg,"")
                }
            }
        },function(e){
            var d=e.msg?e.msg:e;
            Dbl.Utils.showErrorMsg(d,"")
        })
    },
    getCreateSQL:function(j){
        var a=this.getStore();
        var n=new Array();
        var s=new Array();
        var o=new Array();
        var q="";
        for(var g=0,e=a.data.items.length;g<e;g++){
            var d=a.data.items[g].data;
            if(d.field_name||d.datatype){
                n.push(d)
            }
        }
        if(!n.length){
            q="CREATE TABLE `NewTable`;"
        }else{
            for(var g=0;g<n.length;g++){
                var k=n[g];
                var b="";
                if(k.field_name){
                    b+=" `"+k.field_name+"` "
                }else{
                    b+=" `` "
                }
                if(k.datatype){
                    b+=" "+k.datatype
                }
                if(k.length){
                    b+="("+k.length+")"
                }
                if(k.unsigned){
                    b+=" UNSIGNED "
                }
                if(k.zerofill){
                    b+=" ZEROFILL "
                }
                if(k.collation&&(k.collation!="[default]")){
                    b+=" COLLATE "+k.collation
                }
                if(k.primary_key||k.not_null){
                    b+=" NOT NULL "
                }else{
                    b+=" NULL "
                }
                if(k.default_value){
                    var r=k.default_value;
                    k.default_value=r.replace(/[\']{1}/gi,"");
                    var m=/\s/g;
                    if(m.test(k.default_value)||k.datatype.toLowerCase()=="enum"){
                        k.default_value="'"+k.default_value+"'"
                    }
                    b+=" DEFAULT "+k.default_value
                }
                if(k.auto_incr){
                    b+=" AUTO_INCREMENT "
                }
                if(k.comment){
                    b+=" COMMENT '"+k.comment+"' "
                }
                s.push(b);
                if(k.primary_key){
                    o.push("`"+k.field_name+"`")
                }
            }
            if(o.length){
                var f=o.join(", ");
                var p=" PRIMARY KEY ("+f+")";
                s.push(p)
            }
            var c=s.join(",\n");
            var h=(j)?("`"+j+"`"):("`NewTable`");
            var q="CREATE TABLE "+h+" (\n"+c+"\n);"
        }
        return q
    },
    createMoreTableConfirm:function(a){
        Ext.Msg.show({
            title:"Confirmation",
            msg:"Do you want to add more tables?",
            buttons:Ext.Msg.YESNO,
            fn:a.createMoreTable,
            animEl:document.body,
            icon:Ext.MessageBox.QUESTION,
            scope:a
        })
    },
    createMoreTable:function(e){
        if(e=="yes"){
            Dblite.dataPanel.activate("create_table_panel");
            var a=Dblite.dataPanel.getActiveTab();
            a.get("create_table_grid").getStore().removeAll();
            for(var d=0;d<10;d++){
                this.addField()
            }
            a.get("preview_create_sql").hide();
            a.get("create_table_grid").show();
            a.closePreviewSQL(true,false);
            a.doLayout()
        }else{
            if(e=="no"){
                Dblite.dataPanel.remove("create_table_panel");
                var c="table";
                var f=Explorer.selectedDatabase;
                var b=Explorer.selectedTable;
                Explorer.explorerPanel.removeAll();
                Explorer.loadExplorerData(f,b,"table");
                Explorer.selectedNodeType="table";
                Explorer.getDbTablesAndColumns()
            }
        }
    },
    validateDefinitionAndAlterTable:function(){
        var a=this.validateDefinition();
        if(a){
            this.alterTable(false)
        }
    },
    alterTable:function(a){
        var b=this.getAlterSQL(this.table);
        Server.sendCommand("alter_table",{
            parent_database:this.database,
            target_table:this.table,
            alter_sql:b
        },function(e){
            if(e.success){
                Explorer.getDbTablesAndColumns();
                var c=Ext.getCmp("alter_table_grid");
                c.reset();
                c.primary_key_columns=new Array();
                c.store.each(function(f){
                    if(f.data.primary_key){
                        c.primary_key_columns.push(f.data.field_name)
                    }
                });
                if(e.msg){
                    Ext.Msg.show({
                        title:"Success",
                        msg:e.msg,
                        buttons:Ext.Msg.OK,
                        fn:Ext.getCmp("alter_table_panel").refreshStore,
                        animEl:document.body,
                        icon:Ext.MessageBox.INFO
                    });
                    if(a){
                        var d=Explorer.explorerTreePanelObj.getNodeById(Explorer.selectedColumnNodeId);
                        d.remove();
                        Explorer.selectedColumn="";
                        Explorer.selectedColumnNodeId=""
                    }else{
                        Explorer.explorerPanel.removeAll();
                        Explorer.loadExplorerData(Explorer.selectedDatabase,Explorer.selectedTable,"table")
                    }
                    Dblite.dataPanel.showTableStructurePanel(true)
                }else{
                    Ext.getCmp("alter_table_panel").refreshStore()
                }
            }else{
                if(!e.success){
                    Dbl.Utils.showErrorMsg(e.msg,"")
                }
            }
        },function(d){
            var c=d.msg?d.msg:d;
            Dbl.Utils.showErrorMsg(c,"")
        })
    },
    getAlterSQL:function(j){
        var a=this;
        var b=a.getStore();
        var h=b.data.items;
        var f=new Array();
        for(var d=0;d<h.length;d++){
            var k=h[d];
            if(k.data.field_name){
                f.push(k.data);
                if(k.new_field){
                    if(this.addedFields.indexOf(k.data.field_name)==-1){
                        this.addedFields.push(k.data.field_name)
                    }
                }
            }
        }
        var e=this.getActualModifiedFields(this.modifiedFields,this.changedFieldsNew,this.deletedFields,this.addedFields);
        var c=this.getActualChangedFields(this.changedFieldsNew,this.deletedFields,this.addedFields);
        var g=this.getActualDeletedFields(this.changedFieldsNew,this.deletedFields,this.table_columns);
        if(!this.addedFields.length&&!e.length&&!c.length&&!g.length){
            return"ALTER TABLE `"+Explorer.selectedDatabase+"`.`"+Explorer.selectedTable+"`;"
        }else{
            return this.createAlterSQL(j,f,this.addedFields,c,e,g)
        }
    },
    reset:function(){
        this.gridColumns=new Array();
        this.changedFieldsOld=new Array();
        this.changedFieldsNew=new Array();
        this.modifiedFields=new Array();
        this.deletedFields=new Array();
        this.addedFields=new Array()
    },
    getActualModifiedFields:function(h,e,j,d){
        if(e.length){
            for(var b=0;b<e.length;b++){
                var g=e[b];
                var f=h.indexOf(g.old_col);
                if(f!=-1){
                    h.splice(f,1)
                }
                var a=h.indexOf(g.new_col);
                if(a!=-1){
                    h.splice(a,1)
                }
            }
        }
        if(j.length){
            for(var b=0;b<j.length;b++){
                var g=j[b];
                var c=h.indexOf(g);
                if(c!=-1){
                    h.splice(c,1)
                }
            }
        }
        if(this.addedFields.length){
            for(var b=0;b<d.length;b++){
                var g=d[b];
                var c=h.indexOf(g);
                if(c!=-1){
                    h.splice(c,1)
                }
            }
        }
        return h
    },
    getActualChangedFields:function(b,a,d){
        if(b.length){
            for(var c=0;c<b.length;c++){
                var e=b[c];
                if((a.indexOf(e.old_col)!=-1)||(d.indexOf(e.old_col)!=-1)){
                    b.splice(c,1)
                }
                if((a.indexOf(e.new_col)!=-1)||(d.indexOf(e.new_col)!=-1)){
                    b.splice(c,1)
                }
            }
        }
        return b
    },
    getActualDeletedFields:function(b,a,c){
        if(b.length){
            for(var e=0;e<b.length;e++){
                var g=b[e];
                var d=a.indexOf(g.new_col);
                if(d!=-1){
                    a[d]=g.old_col
                }
            }
        }
        if(a.length){
            for(var e=0;e<a.length;e++){
                var f=a[e];
                if(c.indexOf(f)==-1){
                    a.splice(e,1)
                }
            }
        }
        return a
    },
    createAlterSQL:function(s,n,j,h,m,r){
        var l=new Array();
        var c=new Array();
        var k=new Array();
        var g="";
        var b="";
        var p="";
        var t=new Array();
        var e=new Array();
        var w=new Array();
        for(var q=0;q<n.length;q++){
            var d=n[q];
            l[d.field_name]=d;
            if(d.primary_key){
                c.push("`"+d.field_name+"`");
                k.push(d.field_name)
            }
        }
        var u=false;
        if(this.primary_key_columns.length!=c.length){
            u=true
        }else{
            var v=Dbl.Utils.getPrimaryKeyDiff(this.primary_key_columns,k);
            if(v.length){
                u=true
            }
        }
        if(u&&this.primary_key_columns.length){
            g=" DROP PRIMARY KEY"
        }
        if(u&&c.length){
            b=" ADD PRIMARY KEY ("+c.join(", ")+")"
        }
        if(r.length){
            p=this.getDroppedColumnDefinitions(r)
        }
        for(var x in l){
            if(j.length&&(j.indexOf(x)!=-1)){
                t.push(this.getColumnDefinition("ADD",x,l))
            }else{
                if(m.length&&(m.indexOf(x)!=-1)){
                    e.push(this.getColumnDefinition("MODIFY",x,l))
                }else{
                    for(var q=0;q<h.length;q++){
                        var f=h[q];
                        if(x==f.new_col){
                            w.push(this.getColumnDefinition("CHANGE",x,l,f.old_col))
                        }
                    }
                }
            }
        }
        var o=" ALTER TABLE `"+Explorer.selectedDatabase+"`.`"+Explorer.selectedTable+"` \n";
        if(p.length){
            o+=p.join(",\n")
        }
        if(t.length){
            var a=(p.length)?",\n":"";
            o+=a+t.join(",\n")
        }
        if(w.length){
            var a=(p.length||t.length)?",\n":"";
            o+=a+w.join(",\n")
        }
        if(e.length){
            var a=(p.length||t.length||w.length)?",\n":"";
            o+=a+e.join(",\n")
        }
        if(u&&this.primary_key_columns.length){
            var a=(p.length||t.length||w.length||e.length)?",\n":"";
            o+=a+g
        }
        if(u&&c.length){
            var a=(p.length||t.length||w.length||e.length||u)?",\n":"";
            o+=a+b
        }
        return o
    },
    getDroppedColumnDefinitions:function(a){
        var c=new Array();
        for(var b=0;b<a.length;b++){
            c.push(" DROP COLUMN `"+a[b]+"`")
        }
        return c
    },
    getColumnDefinition:function(h,b,c,g){
        var k=c[b];
        var a=" ";
        if(k.datatype){
            a+=k.datatype
        }
        if(k.length){
            a+="("+k.length+")"
        }
        if(k.unsigned){
            a+=" UNSIGNED"
        }
        if(k.zerofill){
            a+=" ZEROFILL"
        }
        if(k.collation&&(k.collation!="[default]")){
            a+=" COLLATE "+k.collation
        }
        if(k.primary_key||k.not_null){
            a+=" NOT NULL"
        }
        if(k.default_value){
            var n=k.default_value;
            k.default_value=n.replace(/[\']{1}/gi,"");
            var e=/\s/g;
            if(e.test(k.default_value)||k.datatype.toLowerCase()=="enum"){
                k.default_value="'"+k.default_value+"'"
            }
            a+=" DEFAULT "+k.default_value
        }
        if(k.auto_incr){
            a+=" AUTO_INCREMENT"
        }
        if(k.comment){
            a+=" COMMENT '"+k.comment+"'"
        }
        var j=" ";
        if((h=="ADD")||(h=="CHANGE")){
            var m=new Array();
            for(var l in c){
                m.push(l)
            }
            var d=m.indexOf(b);
            if(d!=-1){
                if(d>0){
                    var f=m[d-1];
                    j+=" AFTER `"+f+"`"
                }else{
                    j+=" FIRST"
                }
            }
        }
        if(h=="ADD"){
            a=" ADD COLUMN `"+b+"` "+a+j
        }else{
            if(h=="MODIFY"){
                a=" MODIFY COLUMN `"+b+"` "+a
            }else{
                if(h=="CHANGE"){
                    a=" CHANGE COLUMN `"+g+"` `"+b+"` "+a+j
                }
            }
        }
        return a
    },
    selectTableColumn:function(c){
        if(!Explorer.selectedColumn){
            return
        }
        var b=this.store;
        var d=this.getSelectionModel();
        d.clearSelections();
        var a=null;
        b.each(function(e){
            if((e.data.field_name==Explorer.selectedColumn)||(e.data.field_name==c)){
                a=e
            }
        });
        if(a){
            d.selectRecords([a])
        }
    },
    handleRowDeselect:function(c,b,a){
        if(a.data.field_name==Explorer.selectedColumn){
            Explorer.selectedColumn="";
            Explorer.selectedColumnNodeId=""
        }
    },
    dropTableColumn:function(a){
        Ext.getCmp("alter_table_panel").closeAlterSQLPreview();
        Ext.getCmp("alter_table_grid").selectTableColumn(a);
        Ext.getCmp("alter_table_grid").dropColumnConfirm(a)
    }
});
Dbl.CreateTablePanel=function(d){
    var c=new Dbl.CreateTableGridPanel(d);
    c.reset();
    c.database=d.database;
    c.table=d.table;
    c.table_columns=d.table_columns;
    c.key_names=d.key_names;
    c.primary_key_columns=d.primary_key_columns;
    var b=true;
    if(!d.create_table&&(Dbl.UserActivity.getValue("table_type")=="view")){
        b=false
    }
    var a=new Ext.Panel({
        id:(d.create_table)?("preview_create_sql"):("preview_alter_sql"),
        autoScroll:true,
        border:false,
        items:[],
        listeners:{
            beforeshow:this.activateTab.createCallback(c,d.create_table,d.alter_table),
            scope:this
        }
    });
    Dbl.CreateTablePanel.superclass.constructor.call(this,{
        id:(d.create_table)?("create_table_panel"):("alter_table_panel"),
        title:(d.create_table)?("Create Table"):("Alter table '"+Dbl.UserActivity.getValue("table")+"' in '"+Dbl.UserActivity.getValue("table")+"'"),
        tabTip:"Create table in '"+Dbl.UserActivity.getValue("database")+"'",
        layout:"fit",
        split:true,
        border:false,
        closable:d.create_table?true:false,
        header:d.create_table?true:false,
        tbar:b?this.buildTopToolbar(c,d.create_table,d.alter_table):"",
        items:[c,a],
        listeners:{
            beforeclose:this.cancelConfirm.createCallback(d.create_table,d.alter_table)
        }
    })
};

Ext.extend(Dbl.CreateTablePanel,Ext.Panel,{
    activateTab:function(d,c,b){
        d.stopEditing(false);
        var f="";
        if(c){
            f=d.getCreateSQL()
        }else{
            if(b){
                f=d.getAlterSQL(d.table)
            }
        }
        var a={
            id:"preview_sql_codemirror_panel",
            xtype:"uxCodeMirrorPanel",
            parser:"sql",
            padding:"2",
            border:false,
            autoScroll:true,
            sourceCode:f,
            codeMirror:{
                height:"100%",
                width:"100%",
                lineNumbers:false,
                readOnly:true
            }
        };
    
        if(c){
            var e=Dblite.dataPanel.get("create_table_panel").get("preview_create_sql");
            e.removeAll();
            e.add(a);
            e.doLayout()
        }else{
            if(b){
                var e=Ext.getCmp("column_info").get("alter_table_panel").get("preview_alter_sql");
                e.removeAll();
                e.add(a);
                e.doLayout()
            }
        }
    },
    buildTopToolbar:function(f,e,c){
        var b={
            text:"Create",
            id:"create_table_btn",
            tooltip:"Create new table",
            iconCls:"create_table",
            width:60,
            handler:f.validateDefinitionAndCreateTable,
            scope:f
        };
    
        var a={
            text:"Alter",
            tooltip:"Alter table",
            iconCls:"alter_table_column",
            width:60,
            handler:f.validateDefinitionAndAlterTable,
            scope:f
        };
    
        var d=(e)?b:a;
        var g=[{
            xtype:"buttongroup",
            disabled:c?true:false,
            items:[d,{
                text:"Cancel",
                tooltip:(e)?"Cancel table creation":"Cancel changes",
                iconCls:"cancel_table_create",
                width:60,
                handler:this.cancelConfirm.createCallback(e,c),
                scope:this
            }]
        },"-",{
            xtype:"buttongroup",
            disabled:false,
            items:[{
                text:"Add",
                tooltip:"Add new column",
                iconCls:"add_table_column",
                width:60,
                handler:f.addField,
                scope:f
            },{
                text:"Drop",
                tooltip:"Drop selected columns(s)",
                iconCls:"remove_table_column",
                width:60,
                handler:f.removeFieldConfirm,
                scope:f
            }]
        },"-",{
            xtype:"buttongroup",
            items:[{
                text:"Refresh",
                tooltip:"Refresh",
                iconCls:"refresh_table_column",
                width:60,
                handler:this.refreshStore,
                scope:this
            }]
        },"-",{
            width:60,
            disabled:true,
            hidden:true
        },{
            xtype:"buttongroup",
            items:[{
                text:"Preview SQL",
                tooltip:"Preview SQL",
                iconCls:"preview_sql",
                iconAlign:"left",
                handler:this.previewSQL.createCallback(e,c),
                scope:this
            },{
                text:"Close Preview",
                tooltip:"Close SQL preview",
                iconCls:"cancel_preview_sql",
                iconAlign:"left",
                handler:this.closePreviewSQL.createCallback(e,c),
                scope:this,
                hidden:true
            }]
        }];
        if(e){
            g.splice(3,2)
        }
        return g
    },
    previewSQL:function(c,b){
        if(c){
            var a=Dblite.dataPanel.get("create_table_panel")
        }else{
            if(b){
                var a=Ext.getCmp("column_info").get("alter_table_panel")
            }
        }
        var e=(b)?221:136;
        var d=a.getTopToolbar();
        if(c){
            d.get(4).setWidth(e);
            d.get(4).show();
            d.get(2).hide();
            d.get(3).hide();
            d.get(5).get(0).hide();
            d.get(5).get(1).show();
            a.get("create_table_grid").hide();
            a.get("preview_create_sql").show()
        }else{
            if(b){
                d.get(6).setWidth(e);
                d.get(6).show();
                d.get(2).hide();
                d.get(3).hide();
                d.get(4).hide();
                d.get(5).hide();
                d.get(7).get(0).hide();
                d.get(7).get(1).show();
                a.get("alter_table_grid").hide();
                a.get("preview_alter_sql").show()
            }
        }
        d.doLayout()
    },
    closePreviewSQL:function(b,a){
        if(b){
            Ext.getCmp("create_table_panel").closeCreateSQLPreview()
        }else{
            if(a){
                Ext.getCmp("alter_table_panel").closeAlterSQLPreview()
            }
        }
    },
    closeCreateSQLPreview:function(){
        var a=Dblite.dataPanel.get("create_table_panel");
        a.get("create_table_grid").show();
        var b=a.getTopToolbar();
        b.get(2).show();
        b.get(3).show();
        b.get(4).hide();
        b.get(5).get(0).show();
        b.get(5).get(1).hide()
    },
    closeAlterSQLPreview:function(){
        var a=Ext.getCmp("column_info").get("alter_table_panel");
        a.get("alter_table_grid").show();
        var b=a.getTopToolbar();
        b.get(2).show();
        b.get(3).show();
        b.get(4).show();
        b.get(5).show();
        b.get(6).hide();
        b.get(7).get(0).show();
        b.get(7).get(1).hide()
    },
    cancelConfirm:function(c,b){
        var a=c?"quit":"cancel";
        Ext.Msg.confirm("Confirmation",Messages.getMsg("cancel_create_table",[a]),function(d){
            if(d=="yes"){
                if(c){
                    Dblite.dataPanel.remove("create_table_panel")
                }else{
                    Ext.getCmp("alter_table_panel").refreshStore()
                }
            }
        });
        return false
    },
    refreshStore:function(){
        Server.sendCommand("get_table_creation_info",{
            parent_database:Explorer.selectedDatabase,
            table:Explorer.selectedDatabase+"."+Explorer.selectedTable,
            scope:this
        },function(b){
            if(b.success){
                b.create_table=false;
                b.alter_table=true;
                var a=Ext.getCmp("alter_table_grid").getStore();
                a.removeAll();
                a.loadData(b.rows);
                Ext.getCmp("alter_table_panel").getTopToolbar().get(0).disable();
                Ext.getCmp("alter_table_panel").closePreviewSQL(false,true);
                Ext.getCmp("alter_table_grid").reset()
            }else{
                if(!b.success){
                    Dbl.Utils.showErrorMsg(b.msg,"")
                }
            }
        },function(b){
            var a=b.msg?b.msg:b;
            Dbl.Utils.showErrorMsg(a,"")
        })
    }
});
Dbl.CreateViewPanel=function(b){
    var a=[{
        fieldLabel:"New view name",
        name:"viewname",
        allowBlank:false,
        xtype:"textfield",
        vtype:"alphanum",
        emptyText:(b=="RENAME")?Explorer.selectedView:""
    },{
        name:"database",
        xtype:"hidden",
        value:Explorer.selectedDatabase
    }];
    var c=[{
        text:(b=="CREATE")?"create":"rename",
        handler:this.getViewName.createDelegate(this,[b])
    },{
        text:"cancel",
        handler:this.cancelCreateView,
        scope:this
    }];
    Dbl.CreateViewPanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"create_view_form",
        frame:true,
        labelWidth:100,
        defaults:{
            width:150
        },
        items:a,
        buttons:c
    })
};
    
Ext.extend(Dbl.CreateViewPanel,Ext.form.FormPanel,{
    getViewName:function(b){
        var a=Ext.getCmp("create_view_form").getForm().getFieldValues();
        var d=a.viewname;
        var c=a.database;
        if(d&&c){
            if(b=="CREATE"){
                var e=this.getViewSQL(d,c);
                this.addCreateViewEditor(d,e)
            }else{
                if(b=="RENAME"){
                    this.renameView(d,c)
                }
            }
        }
    },
    getViewSQL:function(d,c){
        var a="DROP VIEW IF EXISTS `"+c+"`.`"+d+"`;";
        var b="CREATE \n/*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}] \n [DEFINER = { user | CURRENT_USER }] \n [SQL SECURITY { DEFINER | INVOKER }]*/ \nVIEW `"+c+"`.`"+d+"`  \nAS (SELECT * FROM ...); \n";
        return a+"\n\n"+b
    },
    addCreateViewEditor:function(b,c){
        Editor.browserPanel.selectedQueryFolder="";
        Editor.browserPanel.selectedQueryFile="";
        Editor.addEditor(c,true);
        var a=Editor.tabPanel.getActiveTab();
        a.editortype="view_editor";
        this.cancelCreateView()
    },
    renameView:function(b,a){
        Database.sendCommand("rename_view",{
            dbname:a,
            newview:b,
            oldview:Explorer.selectedView
        },function(d){
            this.cancelCreateView();
            var c=Explorer.explorerTreePanelObj.getNodeById(Explorer.selectedViewNodeId);
            c.setText(b);
            Explorer.selectedView=b
        })
    },
    cancelCreateView:function(){
        Ext.getCmp("create_view_window").close()
    }
});
var Database={
    databases:null,
    tables:[],
    columns:[],
    sendCommand:function(b,a,c){
        if(a.scope){
            c=c.createDelegate(a.scope);
            delete a.scope
        }
        Database[b].call(this,a,c)
    },
    cache_explorer_data:function(b,c){
        var a=["show databases"];
        if(b.dbname){
            if(b.dbname=="information_schema"){
                a.push("show tables from `information_schema`")
            }else{
                a.push("select TABLE_NAME from `information_schema`.`TABLES` where TABLE_SCHEMA = '"+b.dbname+"' and TABLE_TYPE = 'BASE TABLE'")
            }
        }
        if(b.tablename){
            a.push("select COLUMN_NAME, COLUMN_TYPE, COLUMN_KEY from `information_schema`.`COLUMNS` where TABLE_SCHEMA = '"+b.dbname+"' and TABLE_NAME = '"+b.tablename+"'")
        }
        Database.selectQueries(a,b,function(f){
            Database.databases=f.results[0];
            if(b.connectiondb){
                var d=false;
                for(var e=0;e<Database.databases.length;e++){
                    if(Database.databases[e][0]==b.connectiondb){
                        d=true;
                        Database.databases=[[b.connectiondb]];
                        break
                    }
                }
                if(!d){
                    Database.databases=null
                }
            }
            if(b.dbname){
                Database.tables[b.dbname]=f.results[1]
            }
            if(b.tablename){
                if(!Database.columns[b.dbname]){
                    Database.columns[b.dbname]=[]
                }
                Database.columns[b.dbname][b.tablename]=f.results[2]
            }
            if(c){
                c()
            }
        })
    },
    drop_database:function(a,b){
        Database.executeQuery("drop database if exists `"+a.dbname+"`",a,b)
    },
    create_database:function(b,c){
        var a="create database `"+b.dbname+"`";
        if(b.charset){
            a+=" character set "+b.charset
        }
        if(b.collation){
            a+=" collate "+b.collation
        }
        Database.executeQuery(a,b,c)
    },
    get_charset_collation:function(b,c){
        var a=["select CHARACTER_SET_NAME from `information_schema`.`CHARACTER_SETS`","select COLLATION_NAME from `information_schema`.`COLLATIONS`"];
        Database.selectQueries(a,b,function(d){
            c({
                charsets:d.results[0],
                collations:d.results[1]
            })
        })
    },
    get_table_indexes:function(a,b){
        Database.selectQuery("select INDEX_NAME, COLUMN_NAME, IF(NON_UNIQUE>0, 0,1) as UNIQUE1, IF(STRCMP(INDEX_TYPE,'FULLTEXT'),1,0) as FULLTEXT1, SEQ_IN_INDEX  from information_schema.STATISTICS where TABLE_SCHEMA = '"+a.database+"' and TABLE_NAME = '"+a.table+"' order by INDEX_NAME, SEQ_IN_INDEX",a,b)
    },
    get_db_tables:function(b,c){
        if(!b.asView&&Database.tables[b.dbname]){
            if(c){
                c({
                    result:Database.tables[b.dbname]
                })
            }
            return
        }else{
            if(b.asView){
                b.db_tables=true
            }
        }
        if(b.dbname=="information_schema"){
            var a="show tables from `information_schema`"
        }else{
            var a="select TABLE_NAME As Table_Name from `information_schema`.`TABLES` where TABLE_SCHEMA = '"+b.dbname+"' and TABLE_TYPE = 'BASE TABLE'"
        }
        Database.selectQuery(a,b,c)
    },
    get_table_columns:function(a,b){
        if(!a.asView&&Database.columns[a.dbname]&&Database.columns[a.dbname][a.tablename]){
            if(b){
                b({
                    result:Database.columns[a.dbname][a.tablename]
                })
            }
            return
        }
        Database.selectQuery("select COLUMN_NAME, COLUMN_TYPE, COLUMN_KEY from `information_schema`.`COLUMNS` where TABLE_SCHEMA = '"+a.dbname+"' and TABLE_NAME = '"+a.tablename+"'",a,b)
    },
    get_table_status:function(a,b){
        if(a.asView){
            a.advanced_properties=true;
            a.config={
                border:false,
                autoExpandColumn:"values"
            }
        }
        Database.selectQuery("show table status from `"+a.database+"` like '"+a.table+"'",a,b)
    },
    get_table_ddl:function(a,b){
        Database.selectQuery("show create table `"+a.database+"`.`"+a.table+"`",a,b)
    },
    get_db_views:function(a,b){
        if(a.asView){
            a.db_views=true
        }
        Database.selectQuery("select TABLE_NAME As View_Name from `information_schema`.`TABLES` where TABLE_SCHEMA = '"+a.dbname+"' and TABLE_TYPE='VIEW'",a,b)
    },
    get_db_procedures:function(a,b){
        if(a.asView){
            a.db_procedures=true
        }
        Database.selectQuery("select `SPECIFIC_NAME` as Procedure_Name from `INFORMATION_SCHEMA`.`ROUTINES` where `ROUTINE_SCHEMA` = '"+a.dbname+"' and ROUTINE_TYPE='PROCEDURE'",a,b)
    },
    get_db_functions:function(a,b){
        if(a.asView){
            a.db_functions=true
        }
        Database.selectQuery("select `SPECIFIC_NAME` Function_Name from `INFORMATION_SCHEMA`.`ROUTINES` where `ROUTINE_SCHEMA` = '"+a.dbname+"' and ROUTINE_TYPE='FUNCTION'",a,b)
    },
    get_db_full_tables:function(a,b){
        Database.selectQuery("show table status from `"+a.dbname+"` where engine is not NULL",a,b)
    },
    get_server_databases:function(a,b){
        if(!a.asView&&Database.databases){
            if(b){
                b({
                    result:Database.databases
                })
            }
            return
        }
        a.server_databases=true;
        Database.selectQuery("show databases",a,b)
    },
    get_server_variables:function(a,b){
        if(a.asView){
            a.server_vars=true;
            a.config={
                border:false,
                autoExpandColumn:"Value"
            }
        }
        Database.selectQuery("show variables",a,b)
    },
    get_server_status:function(a,b){
        if(a.asView){
            a.server_status=true;
            a.config={
                border:false,
                autoExpandColumn:"Value"
            }
        }
        Database.selectQuery("show status",a,b)
    },
    get_server_processes:function(a,b){
        Database.selectQuery("show full processlist",a,b)
    },
    drop_table:function(a,b){
        Database.executeQuery("drop table `"+a.database+"`.`"+a.table+"`",a,b)
    },
    truncate_table:function(a,b){
        Database.executeQuery("truncate table `"+a.database+"`.`"+a.table+"`",a,b)
    },
    rename_table:function(a,b){
        Database.executeQuery("rename table `"+a.database+"`.`"+a.table+"` to `"+a.rename+"`",a,b)
    },
    executeQuery:function(b,a,c){
        Server.sendCommand("database.execute_query",{
            sql:b
        },c)
    },
    selectQuery:function(b,a,c){
        if(a.asView){
            Database.selectQueryAsView(b,a,c)
        }else{
            Server.sendCommand("database.select_query",{
                sql:b
            },c)
        }
    },
    selectQueries:function(a,b,c){
        Server.sendCommand("database.select_queries",{
            sqls:a
        },c)
    },
    selectQueryAsView:function(b,a,c){
        Server.sendCommand("database.select_query",{
            sql:b,
            cols:true
        },function(m){
            if(a.server_databases&&a.connectiondb){
                for(var g=0;g<m.result.length;g++){
                    var u=m.result[g][0];
                    if(u==a.connectiondb){
                        m.result=[m.result[g]];
                        break
                    }
                }
            }
            if(a.advanced_properties){
                m=Database.get_advanced_properties_data(m)
            }
            var q=m.columns;
            var e=[];
            for(var n=0;n<q.length;n++){
                var s=q[n];
                var p=s;
                if(a.advanced_properties){
                    p=s.substr(0,1).toUpperCase()+s.substr(1,s.length)
                }else{
                    if(a.server_vars||a.server_status||a.db_tables||a.db_views||a.db_procedures||a.db_functions){
                        var k=p.split("_");
                        for(var h=0;h<k.length;h++){
                            k[h]=k[h].substr(0,1).toUpperCase()+k[h].substr(1,k[h].length)
                        }
                        p=k.join(" ")
                    }
                }
                var r={
                    id:s,
                    header:p,
                    ctype:"",
                    sortable:true,
                    dataIndex:s
                };
    
                e.push(r)
            }
            var f=a.config;
            if(!f){
                f={
                    border:false
                }
            }
            var o=Ext.applyIf(f,{
                fields:q,
                models:e,
                data:m.result
            });
            var d=new Dbl.ListViewPanel(o);
            if(a.refreshable){
                var t=Dbl.Utils.getAutoRefreshPanel(b,a,c,d);
                if(a.autorefresh_lap){
                    t.params=a
                }
                c({
                    panel:t
                });
                return
            }
            c({
                panel:d
            })
        })
    },
    drop_view:function(a,b){
        Database.executeQuery("drop view `"+a.dbname+"`.`"+a.view+"`",a,b)
    },
    drop_procedure:function(a,b){
        Database.executeQuery("drop procedure `"+a.dbname+"`.`"+a.procedurename+"`",a,b)
    },
    drop_function:function(a,b){
        Database.executeQuery("drop function `"+a.dbname+"`.`"+a.functionname+"`",a,b)
    },
    get_advanced_properties_data:function(d){
        var c=d.columns;
        var a=d.result[0];
        d.columns=["properties","values"];
        d.result=[];
        for(var b=0;b<c.length;b++){
            var e=[c[b],a[b]];
            d.result.push(e)
        }
        return d
    }
};

Dbl.DataPanel=function(c,b,a){
    Dbl.DataPanel.superclass.constructor.call(this,{
        id:"datapanel",
        title:"Result",
        region:"north",
        height:parseInt(Dbl.UserSettings.datapanelHeight),
        hidden:Dbl.UserSettings.datapanelHidden,
        minSize:200,
        maxSize:800,
        split:true,
        activeItem:Dbl.UserActivity.getValue("datapanelActiveTab"),
        border:true,
        margins:"0 2 0 0",
        resizeTabs:true,
        minTabWidth:115,
        enableTabScroll:true,
        items:[
        //        {
        //            id:"serverstructure",
        //            title:"Connection",
        //            tabTip:"Connection",
        //            layout:"fit",
        //            listeners:{
        //                activate:function(){
        //                    this.activate1()
        //                },
        //                scope:this
        //            },
        //            items:[]
        //        },
        {
            id:"dbstructure",
            title:"DB Structure",
            tabTip:"DB Structure",
            layout:"fit",
            listeners:{
                activate:function(){
                    this.activate1()
                },
                scope:this
            },
            items:[]
        },{
            id:"tablestructure",
            title:"Table Structure",
            tabTip:"Table Structure",
            layout:"fit",
            listeners:{
                activate:function(){
                    this.activate1()
                },
                scope:this
            },
            items:[]
        },{
            id:"history",
            title:"History",
            tabTip:"Query execution history",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:function(){
                    this.activate1()
                },
                scope:this
            },
            items:[]
        }],
        listeners:{
            hide:this.handleAfterHide,
            show:this.handleAfterShow,
            scope:this
        }
    })
};

Ext.extend(Dbl.DataPanel,Ext.TabPanel,{
    selectedDatabase:"",
    selectedTable:"",
    reloadStructureData:true,
    tableDataPanel:"",
    tableStructurePanel:"",
    dbStructurePanel:"",
    serverStructurePanel:"",
    lastTableTabId:"",
    hide1:function(a){
        this.hideTabStripItem(a);
        this.get(a).hide()
    },
    unhide1:function(a,b){
        this.unhideTabStripItem(a);
        this.get(a).hidden=false
    },
    activate1:function(b){
        var a=this.getActiveTab().id;
        Dblite.historytab=0;
        if(a=="tablestructure"){
            this.showTableStructurePanel(b)
        }else{
            if(a=="dbstructure"){
                this.showDbStructurePanel(b)
            }else{
                if(a=="serverstructure"){
                    this.showServerStructurePanel(b)
                }else{
                    if(a=="history"){
                        Dblite.historytab=1;
                        this.showHistoryPanel(b)
                    }
                }
            }
        }
        Dbl.UserActivity.dataPanel.tabChanged(a)
    },
    refresh:function(b){
        if(Dbl.UserActivity.getValue("database")){
            var a=Ext.getCmp("dbstructure");
            if(a){
                a.setTitle("DB: "+Dbl.UserActivity.getValue("database"));
                Ext.fly(a.tabEl).child("span.x-tab-strip-text",true).qtip="Database: "+Dbl.UserActivity.getValue("database")
            }
        }
        if(Dbl.UserActivity.getValue("database")&&!Dbl.UserActivity.getValue("table")){
            this.activate("dbstructure")
        }else{
            if(Dbl.UserActivity.getValue("table")){
                this.activate("tablestructure")
            }
        }
        this.activate1(b)
    },
    showTableDataPanel:function(b){
        var a=this.getActiveTab();
        if(!Explorer.selectedTable){
            return
        }
        if(!b){
            if(this.tableDataPanel&&this.tableDataPanel.table&&this.tableDataPanel.table==Explorer.selectedDbTable){
                return
            }
        }
        Server.sendCommand("get_table_columns",{
            table:Explorer.selectedTable,
            scope:this
        },function(c){
            this.tableDataPanel=new Dbl.TableDataPanel(Explorer.selectedDbTable,c.columns);
            this.tableDataPanel.table=Explorer.selectedDbTable;
            a.removeAll();
            a.add(this.tableDataPanel);
            a.doLayout()
        },function(d){
            var c=d.msg?d.msg:d;
            Dbl.Utils.showErrorMsg(c,"")
        })
    },
    showHistoryPanel:function(c){
        var a=this.getActiveTab();
        var b="";
        Server.sendCommand("get_history",{},function(d){
            b=new HistoryPanel(d);
            a.removeAll();
            a.add(b);
            a.doLayout()
        })
    },
    showTableStructurePanel:function(c){
        var b=this.getActiveTab();
        var a=Dbl.UserActivity.getValue("database")+"."+Dbl.UserActivity.getValue("table");
        if(!c){
            if(this.tableStructurePanel&&this.tableStructurePanel.table&&(this.tableStructurePanel.table==a)){
                return
            }
        }
        this.tableStructurePanel=new Dbl.TableStructurePanel();
        if(Dbl.UserActivity.getValue("table_type")=="view"){
            this.tableStructurePanel.remove("index_info");
            this.tableStructurePanel.remove("table_information")
        }
        this.tableStructurePanel.table=a;
        if(Dbl.UserActivity.getValue("table")){
            var d="Table: ";
            if(Dbl.UserActivity.getValue("table_type")=="view"){
                d="View: "
            }
            b.setTitle(d+Dbl.UserActivity.getValue("table"));
            Ext.fly(b.tabEl).child("span.x-tab-strip-text",true).qtip=b.title
        }
        b.removeAll();
        b.add(this.tableStructurePanel);
        b.doLayout()
    },
    showServerStructurePanel:function(c){
        var a=this.getActiveTab();
        var b=Dbl.UserActivity.getValue("connection");
        if(!c){
            if(this.serverStructurePanel&&(this.serverStructurePanel.connection_id==b)){
                return
            }
        }
        this.serverStructurePanel=new Dbl.ServerStructurePanel();
        this.serverStructurePanel.connection_id=b;
        if(b){
            a.setTitle("Conn: "+b);
            Ext.fly(a.tabEl).child("span.x-tab-strip-text",true).qtip="Connection: "+Dbl.UserActivity.getValue("connection")
        }
        a.removeAll();
        a.add(this.serverStructurePanel);
        a.doLayout()
    },
    showDbStructurePanel:function(d){
        var a=this.getActiveTab();
        var c=Dbl.UserActivity.getValue("database");
        if(!d){
            if(this.dbStructurePanel&&this.dbStructurePanel.database&&(this.dbStructurePanel.database==c)){
                return
            }
        }
        var b=0;
        this.dbStructurePanel=new Dbl.DbStructurePanel();
        this.dbStructurePanel.database=c;
        if(c){
            a.setTitle("DB: "+c);
            Ext.fly(a.tabEl).child("span.x-tab-strip-text",true).qtip="Database :"+Dbl.UserActivity.getValue("database")
        }
        a.removeAll();
        a.add(this.dbStructurePanel);
        a.doLayout()
    },
    removeTablePanelData:function(){
        var a=this.getActiveTab();
        a.removeAll();
        a.add(new Ext.Panel({
            html:Messages.getMsg("notable_selected")
        }));
        a.doLayout();
        Dbl.Utils.hideLoadMask()
    },
    addNewResultTabs:function(d){
        for(var b=0;b<Dblite.dataPanel.items.length;b++){
            var c=Dblite.dataPanel.items.items[b];
            if(c.id!="serverstructure"&&c.id!="dbstructure"&&c.id!="tablestructure"&&c.id!="history"&&c.id!="create_table_panel"){
                Dblite.dataPanel.remove(c);
                b--
            }
        }
        for(var b=0;b<d.length;b++){
            var a=b+1;
            Dblite.dataPanel.add(new Dbl.ResultDataPanel(d[b],a));
            if(a==1){
                Ext.getCmp("result_tab_"+a).setTitle(a+". Result","loading_icon");
                if(d[b].hasError||!d[b].isSelectSQL){
                    Ext.getCmp("result_tab_"+a).setIconClass(" ")
                }
            }
        }
        Dblite.dataPanel.activate("result_tab_1");
        Topmenu.enableExecuteButton()
    },
    addCreateTableTab:function(b){
        var a=new Dbl.CreateTablePanel(b);
        Dblite.dataPanel.add(a);
        Dblite.dataPanel.activate(a)
    },
    handleAfterShow:function(a){
        Dbl.UserActivity.pageLayout.showHideDatapanel()
    },
    handleAfterHide:function(a){
        Dbl.UserActivity.pageLayout.showHideDatapanel()
    }
});
var Dblite={
    loadMask:"",
    waitMask:"",
    dataPanel:"",
    window:"",
    viewport:"",
    rightPanel:"",
    init:function(){
        Topmenu.init();
        Explorer.init();
        Editor.init();
        Dblite.dataPanel=new Dbl.DataPanel();
        Ext.QuickTips.init();
        Dblite.createIframe();
        this.rightPanel=new Ext.Panel({
            region:"center",
            split:true,
            margins:"0 0 0 0",
            border:false,
            layout:"border",
            items:[Editor.containerPanel,Dblite.dataPanel]
        });
        this.viewport=new Ext.Viewport({
            layout:"border",
            items:[Topmenu.menuPanel,Explorer.explorerPanel,this.rightPanel]
        });
        Dblite.intializeMasks();
        Dbl.UserActivity.restore()
    },
    showWindow:function(a){
        if(Dblite.window){
            Dblite.window.close()
        }
        Dblite.window=new Ext.Window(a);
        Dblite.window.show()
    },
    refreshServerList:function(a){
        Server.sendCommand("connection.get_connections",{},function(d){
            Dblite.connectionStore.loadData(d);
            var b=[];
            for(var c=0;c<d.length;c++){
                b.push([d[c][0],d[c][4],false])
            }
            b.push(["Add new connection",false,true]);
            Dblite.connectionComboStore.loadData(b);
            if(a){
                a()
            }
        })
    },
    connectionStore:new Ext.data.SimpleStore({
        fields:["connection_id","type","host","user","database","port","password","save_password"]
    }),
    connectionComboStore:new Ext.data.SimpleStore({
        fields:["connection_id","database","show_new_conn_window"]
    }),
    databaseComboStore:new Ext.data.SimpleStore({
        fields:["database"]
    }),
    intializeMasks:function(){
        if(!Dblite.loadMask){
            Dblite.loadMask=new Ext.LoadMask(document.body,{
                msg:Messages.getMsg("load_mask")
            })
        }
        if(!Dblite.waitMask){
            Dblite.waitMask=new Ext.LoadMask(document.body,{
                msg:Messages.getMsg("wait_mask")
            })
        }
    },
    createIframe:function(){
        Ext.DomHelper.append(document.body,{
            tag:"iframe",
            frameBorder:0,
            name:"download_frame",
            id:"download_frame",
            width:0,
            height:0,
            css:"display:none;visibility:hidden;height:1px;",
            src:""
        })
    },
    showHideDataPanel:function(){
        if(Dblite.dataPanel.hidden){
            Dblite.dataPanel.show()
        }else{
            Dblite.dataPanel.hide()
        }
        Dblite.rightPanel.doLayout()
    },
    showHideEditorPanel:function(){
        if(!Dblite.dataPanel.hidden){
            if(Dblite.rightPanel.getHeight()>Dblite.dataPanel.getHeight()){
                Dblite.dataPanel.setHeight(Dblite.rightPanel.getHeight())
            }else{
                Dblite.dataPanel.setHeight(Dblite.rightPanel.getHeight()-250)
            }
        }
        Dblite.rightPanel.doLayout()
    }
};

Dbl.Settings={
    lastTableTabId:"table_data",
    lastTableStructTabId:"column_info",
    lastDbTabId:"table_list",
    lastServerTabId:"db_list"
};

Dbl.Utils={
    showTBDMsg:function(){
        Ext.MessageBox.show({
            title:"Message",
            msg:Messages.getMsg("tbd_msg"),
            buttons:Ext.Msg.OK,
            animEl:document.body,
            icon:Ext.MessageBox.INFO
        })
    },
    showErrorMsg:function(b,a){
        Ext.MessageBox.show({
            title:"Error",
            msg:b,
            buttons:Ext.Msg.OK,
            animEl:document.body,
            icon:Ext.MessageBox.ERROR
        })
    },
    showInfoMsg:function(b,a){
        Ext.MessageBox.show({
            title:"Success",
            msg:b,
            buttons:Ext.Msg.OK,
            animEl:document.body,
            icon:Ext.MessageBox.INFO
        })
    },
    showLoadMask:function(){
        if(Dblite.loadMask){
            Dblite.loadMask.show()
        }
    },
    hideLoadMask:function(){
        if(Dblite.loadMask){
            Dblite.loadMask.hide()
        }
    },
    showWaitMask:function(){
        if(Dblite.waitMask){
            Dblite.waitMask.show()
        }
    },
    hideWaitMask:function(){
        if(Dblite.waitMask){
            Dblite.waitMask.hide()
        }
    },
    loadExportDataOptions:function(){
        return{
            xtype:"fieldset",
            title:"Export only",
            style:{
                marginTop:"11px"
            },
            items:[{
                xtype:"radiogroup",
                id:"export_group",
                columns:1,
                defaults:{
                    anchor:"100%"
                },
                items:[{
                    name:"export_data",
                    boxLabel:"Structure",
                    inputValue:"structure",
                    style:{
                        marginRight:"4px"
                    }
                },{
                    name:"export_data",
                    boxLabel:"Data",
                    inputValue:"data",
                    style:{
                        marginRight:"4px"
                    }
                },{
                    name:"export_data",
                    boxLabel:"both",
                    inputValue:"both",
                    style:{
                        marginRight:"4px"
                    },
                    checked:true
                }]
            }]
        }
    },
    executeRow:function(){
        Topmenu.disableExecuteButton();
        var b=Ext.getCmp("history_grid").getSelectionModel().getSelected();
        var a=b.data.query;
        Editor.executeQuery(a)
    },
    pushDataToHistory:function(a){},
    getDateFieldEditor:function(a){
        return new Ext.form.DateField({
            format:"Y-m-d"
        })
    },
    getComboBoxEditor:function(b,a){
        return new Ext.form.ComboBox({
            store:new Ext.data.SimpleStore({
                fields:[b],
                data:a
            }),
            displayField:b,
            typeAhead:true,
            forceSelection:true,
            selectOnFocus:true,
            mode:"local",
            triggerAction:"all",
            name:b
        })
    },
    getMultiCheckComboBoxEditor:function(b,a){
        return[{
            xtype:"multiselectfield",
            displayField:b,
            store:a
        }]
    },
    getPrimaryKeyDiff:function(b,c){
        var a=new Array();
        var h=new Array();
        for(var g=0;g<b.length;g++){
            a.push(b[g])
        }
        for(var f=0;f<c.length;f++){
            var m=c[f];
            var l=a.indexOf(m);
            if(l!=-1){
                a.splice(l,1)
            }else{
                a.push(m)
            }
        }
        for(var d=0;d<a.length;d++){
            var e=a[d];
            h.push(e)
        }
        return h
    },
    getAutoRefreshPanel:function(f,e,g,a){
        var c={
            xtype:"tbbutton",
            text:"Refresh",
            tooltip:"Refresh",
            iconCls:"refresh_info_btn",
            width:75,
            handler:function(){
                Database.selectQueryAsView(f,e,g)
            }
        };
    
        var d={
            text:"Auto Refresh",
            tooltip:"Auto Refresh",
            iconCls:"refresh_info_btn",
            width:75,
            menu:{
                xtype:"menu",
                plain:true,
                items:[{
                    xtype:"form",
                    labelWidth:75,
                    frame:true,
                    header:false,
                    border:false,
                    width:200,
                    defaults:{
                        width:98
                    },
                    defaultType:"textfield",
                    items:[{
                        fieldLabel:"Interval(sec)",
                        name:"second",
                        minValue:1,
                        maxValue:86400,
                        value:e.autorefresh_lap?e.autorefresh_lap:10
                    }],
                    buttons:[{
                        text:"Start",
                        tooltip:"Start auto refresh",
                        width:75,
                        handler:function(){
                            var k=Dbl.Utils.getAutoRefreshToolbar();
                            var j=k.items.get(0).items.get(1).menu.items.get(0);
                            var h=j.getForm().getFieldValues();
                            if(h.second<1||h.second>86400){
                                return false
                            }
                            k.items.get(0).items.get(1).menu.hide();
                            k.items.get(0).disable();
                            k.items.get(1).show();
                            k.items.get(2).show();
                            e.autorefresh_lap=h.second;
                            Dbl.Utils.startTaskRunner(h.second,f,e,g,"OTHERS")
                        }
                    },{
                        text:"Cancel",
                        tooltip:"Cancel auto refresh",
                        width:75,
                        handler:function(){
                            var h=Dbl.Utils.getAutoRefreshToolbar();
                            h.items.get(0).items.get(1).menu.hide()
                        }
                    }]
                }]
            }
        };

        var b={
            text:"Stop",
            tooltip:"Stop auto refresh",
            iconCls:"stop_auto_refresh",
            handler:function(){
                e.autorefresh_lap=null;
                var h=Dbl.Utils.getAutoRefreshToolbar();
                h.items.get(0).enable();
                h.items.get(1).hide();
                h.items.get(2).hide();
                Dbl.Utils.stopTaskRunner(this.updatetask,this.updaterunner,this.delayedtask)
            }
        };

        return new Ext.Panel({
            layout:"fit",
            split:true,
            border:false,
            header:false,
            listeners:{
                afterrender:function(){
                    Dbl.Utils.startAutoRefresh(f,e,g)
                },
                afterlayout:function(){
                    Dbl.Utils.removeLoadingIcon()
                },
                scope:this
            },
            tbar:[{
                xtype:"buttongroup",
                disabled:e.autorefresh_lap?true:false,
                items:[c,d]
            },{
                xtype:"tbseparator",
                hidden:!e.autorefresh_lap?true:false,
            },{
                xtype:"buttongroup",
                hidden:!e.autorefresh_lap?true:false,
                items:[{
                    iconAlign:"left",
                    text:e.autorefresh_lap?"Refresh in "+((e.autorefresh_lap>9)?e.autorefresh_lap:"0"+e.autorefresh_lap)+((e.autorefresh_lap==1)?"second":" seconds"):"Refreshing automatically",
                    width:200
                },b]
            }],
            items:[a],
            sql:f,
            params:e,
            callback:g
        })
    },
    getAutoRefreshToolbar:function(){
        var b=Dbl.UserActivity.getValue("datapanelActiveTab");
        if(b=="serverstructure"){
            var a=Dbl.UserActivity.getValue("activeConnTab")
        }else{
            if(b=="dbstructure"){
                var a=Dbl.UserActivity.getValue("activeDbTab")
            }else{
                if(b=="tablestructure"){
                    var a=Dbl.UserActivity.getValue("activeTableTab")
                }
            }
        }
        var c=Ext.getCmp(a).items.get(0).getTopToolbar();
        return c
    },
    startTaskRunner:function(k,o,d,m,g){
        var j="";
        var n="";
        var e="";
        if(g=="TABLEDATA"){
            j=Ext.getCmp("table_data_grid").getTopToolbar();
            var b=j.items.get("tabledata_refresh_btns");
            n=b.nextSibling().nextSibling().items.get(0)
        }else{
            if(g=="SQLRESULT"){
                var f=d.index;
                j=Ext.getCmp("result_tbar_"+f).getTopToolbar();
                var b=j.items.get("tabledata_refresh_btns_"+f);
                n=b.nextSibling().nextSibling().items.get(0)
            }else{
                j=Dbl.Utils.getAutoRefreshToolbar();
                n=j.items.get(2).items.get(0)
            }
        }
        e=n.nextSibling();
        n.setIconClass("");
        var a=0;
        var c={
            run:function(){
                var p=(k-a);
                n.setText("Refresh in "+((p>9)?p:"0"+p)+" second"+((p==1)?"  ":"s"));
                a++
            },
            interval:1000
        };

        var l=new Ext.util.TaskRunner();
        l.start(c);
        if(g=="TABLEDDL"){
            var h=new Ext.util.DelayedTask(function(){
                Ext.getCmp("table_ddl_panel").refreshDDL();
                Dbl.Utils.stopTaskRunner(c,l,h);
                n.setText("Refreshing...");
                n.setIconClass("loading_icon")
            })
        }else{
            if(g=="TABLEDATA"){
                var h=new Ext.util.DelayedTask(function(){
                    Ext.getCmp("table_data_grid").refreshCurrentPage();
                    Dbl.Utils.stopTaskRunner(c,l,h);
                    n.setText("Refreshing...")
                })
            }else{
                if(g=="SQLRESULT"){
                    var h=new Ext.util.DelayedTask(function(){
                        Dbl.Utils.refreshResultPage(d.index);
                        Dbl.Utils.stopTaskRunner(c,l,h);
                        n.setText("Refreshing...");
                        n.setIconClass("loading_icon")
                    })
                }else{
                    var h=new Ext.util.DelayedTask(function(){
                        Database.selectQueryAsView(o,d,m);
                        Dbl.Utils.stopTaskRunner(c,l,h);
                        n.setText("Refreshing...");
                        n.setIconClass("loading_icon")
                    })
                }
            }
        }
        h.delay(k*1000);
        e.updatetask=c;
        e.updaterunner=l;
        e.delayedtask=h
    },
    stopTaskRunner:function(a,c,b){
        c.stop(a);
        b.cancel()
    },
    startAutoRefresh:function(b,a,c){
        if(a.autorefresh_lap){
            Dbl.Utils.startTaskRunner(a.autorefresh_lap,b,a,c,"OTHERS")
        }
    },
    setDatapanelTabsTitle:function(){
        var c=Ext.getCmp("serverstructure");
        if(c){
            c.setTitle("Conn: "+Dbl.UserActivity.getValue("connection"));
            Ext.fly(c.tabEl).child("span.x-tab-strip-text",true).qtip="Connection: "+Dbl.UserActivity.getValue("connection")
        }
        var b=Ext.getCmp("dbstructure");
        if(b){
            b.setTitle("DB Structure");
            Ext.fly(b.tabEl).child("span.x-tab-strip-text",true).qtip="DB Structure"
        }
        var a=Ext.getCmp("tablestructure");
        if(a){
            a.setTitle("Table Structure");
            Ext.fly(a.tabEl).child("span.x-tab-strip-text",true).qtip="Table Structure"
        }
    },
    refreshResultPage:function(b){
        var a=Dblite.dataPanel.get("result_tab_"+b);
        Server.sendCommand("database.execute_queries",{
            sql:a.sql,
            sqldelim:Editor.defaultSQLDelimiter,
            scope:this
        },function(c){
            a.removeAll();
            a.add(Dbl.Utils.getResultChildPanel(c[0],b));
            a.doLayout();
            Dbl.Utils.startTaskRunner(a.autorefresh_lap,"",{
                index:b
            },"","SQLRESULT")
        },function(d){
            var c=d.msg?d.msg:d;
            DbliteUtils.showErrorMsg(c,"")
        })
    },
    getResultChildPanel:function(a,c){
        var b={};
    
        if(a.hasError){
            b={
                border:false,
                html:a.msg,
                bodyStyle:"padding: 5px"
            }
        }else{
            if(a.isSelectSQL){
                b=new Dbl.ResultGridPanel(a,c)
            }else{
                if(!a.isSelectSQL){
                    b={
                        border:false,
                        html:a.execution_status,
                        bodyStyle:"padding: 5px"
                    }
                }
            }
        }
        return b
    },
    getDatapanelSubTab:function(){
        var b=Dbl.UserActivity.getValue("datapanelActiveTab");
        if(b=="serverstructure"){
            var a=Dbl.UserActivity.getValue("activeConnTab")
        }else{
            if(b=="dbstructure"){
                var a=Dbl.UserActivity.getValue("activeDbTab")
            }else{
                if(b=="tablestructure"){
                    var a=Dbl.UserActivity.getValue("activeTableTab")
                }
            }
        }
        return Ext.getCmp(a)
    },
    addLoadingIcon:function(){
        var b=Dbl.Utils.getDatapanelSubTab();
        try{
            if(b.ownerCt){
                var c=b.ownerCt.items.getCount();
                for(var a=0;a<c;a++){
                    b.ownerCt.items.itemAt(a).setIconClass(" ")
                }
            }
            b.setTitle(b.title,"loading_icon")
        }catch(d){}
    },
    removeLoadingIcon:function(){
        var a=Dbl.Utils.getDatapanelSubTab();
        try{
            a.setIconClass(" ")
        }catch(b){}
    },
    checkForDemoVersion:function(){
        var b=window.location.host;
        var a=b.indexOf("demo.dblite.com");
        if(a>-1){
            return true
        }
        return false
    },
    checkForUserVersion:function(){
        var b=window.location.host;
        var a=b.indexOf("user.dblite.com");
        if(a>-1){
            return true
        }
        return false
    },
    checkForRestrictedCommands:function(b){
        var a=/(create|update|delete|drop|set|alter|insert|load|truncate|rename)\s+/gi;
        var c=b.match(a);
        if(c){
            return true
        }
        return false
    },
    showFeatureRestrictionMessage:function(){
        Ext.MessageBox.show({
            title:"Message",
            msg:"This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.",
            buttons:Ext.Msg.OK,
            animEl:document.body,
            icon:Ext.MessageBox.INFO
        })
    },
    password:function(e,b){
        var d=0;
        var a="";
        var c;
        if(b==undefined){
            var b=false
        }while(d<e){
            c=(Math.floor((Math.random()*100))%94)+33;
            if(!b){
                if((c>=33)&&(c<=47)){
                    continue
                }
                if((c>=58)&&(c<=64)){
                    continue
                }
                if((c>=91)&&(c<=96)){
                    continue
                }
                if((c>=123)&&(c<=126)){
                    continue
                }
            }
            d++;
            a+=String.fromCharCode(c)
        }
        return a
    }
};

Dbl.DbStructurePanel=function(){
    Dbl.DbStructurePanel.superclass.constructor.call(this,{
        activeItem:Dbl.UserActivity.getValue("activeDbTab"),
        cls:"dbl-subtab",
        margins:"0 5 0 5",
        resizeTabs:true,
        minTabWidth:125,
        border:false,
        tabPosition:"top",
        enableTabScroll:true,
        items:[{
            id:"table_list",
            title:"Table List",
            layout:"fit",
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"table_full_list",
            title:"Table Information",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"view_list",
            title:"View List",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"procedure_list",
            title:"Procedure List",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"function_list",
            title:"Function List",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        }]
    })
};
    
Ext.extend(Dbl.DbStructurePanel,Ext.TabPanel,{
    activate1:function(){
        var a=this.getActiveTab().id;
        Dbl.UserActivity.dataPanel.dbTabChanged(a);
        Dbl.Utils.addLoadingIcon();
        if(!Server.connection_id){
            this.showMsgPanel(Messages.getMsg("noconnection_selected"));
            Dbl.Utils.removeLoadingIcon()
        }else{
            if(!Dbl.UserActivity.getValue("database")){
                this.showMsgPanel(Messages.getMsg("nodatabase_selected"));
                Dbl.Utils.removeLoadingIcon()
            }else{
                if(a=="table_list"){
                    this.showPanel();
                    Dbl.Settings.lastDbTabId=a
                }else{
                    if(a=="table_full_list"){
                        this.showPanel();
                        Dbl.Settings.lastDbTabId=a
                    }else{
                        if(a=="view_list"){
                            this.showPanel();
                            Dbl.Settings.lastDbTabId=a
                        }else{
                            if(a=="procedure_list"){
                                this.showPanel();
                                Dbl.Settings.lastDbTabId=a
                            }else{
                                if(a=="function_list"){
                                    this.showPanel();
                                    Dbl.Settings.lastDbTabId=a
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    showMsgPanel:function(b){
        var a=this.getActiveTab();
        a.removeAll();
        a.add({
            padding:"10px",
            border:false,
            html:b
        });
        a.doLayout()
    },
    showPanel:function(){
        var a=this.getActiveTab();
        var b=Dbl.UserActivity.getValue("database");
        if(!b){
            Dbl.Utils.removeLoadingIcon();
            return
        }
        if(a.database==b){
            a.doLayout();
            Dbl.Utils.removeLoadingIcon();
            return
        }
        var c="get_db_tables";
        if(a.id=="table_list"){
            c="get_db_tables"
        }
        if(a.id=="table_full_list"){
            c="get_db_full_tables"
        }
        if(a.id=="view_list"){
            c="get_db_views"
        }
        if(a.id=="procedure_list"){
            c="get_db_procedures"
        }
        if(a.id=="function_list"){
            c="get_db_functions"
        }
        Database.sendCommand(c,{
            dbname:b,
            asView:true,
            refreshable:true
        },function(d){
            a.database=b;
            a.removeAll();
            a.add(d.panel);
            a.doLayout()
        })
    }
});
var DuplicateTablePanel=function(c,b){
    var a=[{
        layout:"column",
        items:[{
            columnWidth:1,
            layout:"form",
            items:[{
                xtype:"textfield",
                fieldLabel:"Copy "+b+" to new table",
                name:"new_table",
                value:b+"_copy",
                anchor:"100%"
            }]
        }]
    },{
        xtype:"fieldset",
        title:"Copy Options",
        id:"form_options_cont",
        layout:"column",
        items:[{
            columnWidth:0.5,
            layout:"form",
            items:[{
                xtype:"checkbox",
                boxLabel:"With indexes",
                name:"with_indexes"
            },{
                xtype:"checkbox",
                boxLabel:"With triggers",
                name:"with_triggers",
                checked:true,
                labelSeparator:" ",
                hidden:true
            }]
        },{
            columnWidth:0.5,
            layout:"form",
            items:[{
                xtype:"radio",
                boxLabel:"Structure only",
                name:"structure",
                inputValue:"structure"
            },{
                xtype:"radio",
                boxLabel:"Structure and data",
                name:"structure",
                inputValue:"structure_and_data",
                checked:true
            }]
        }]
    }];
    DuplicateTablePanel.superclass.constructor.call(this,{
        frame:true,
        width:333,
        id:"duplicate_table_form",
        labelAlign:"top",
        items:a
    })
};
    
Ext.extend(DuplicateTablePanel,Ext.FormPanel,{
    handleFieldSelection:function(c,b){
        var a=Ext.getCmp("duplicate_table_grid").getSelectionModel();
        if(b){
            a.selectAll();
            a.lock()
        }else{
            a.unlock()
        }
    },
    validateAndDuplicateTable:function(f,e){
        var d=Ext.getCmp("duplicate_table_form").getForm().getFieldValues();
        var b=Ext.getCmp("duplicate_table_grid").getSelectionModel().getSelections();
        if(!d.new_table){
            var a=Messages.getMsg("duplicate_notable_name");
            Dbl.Utils.showErrorMsg(a,"")
        }else{
            if(!b.length){
                var c=Messages.getMsg("duplicate_nofield_selected");
                Dbl.Utils.showErrorMsg(c,"")
            }else{
                this.duplicateTable(d,b,f,e)
            }
        }
    },
    duplicateTable:function(f,b,g,e){
        var a=this;
        var d=new Array();
        for(var c=0;c<b.length;c++){
            d.push(b[c].data.Field)
        }
        Server.sendCommand("create_duplicate_table",{
            options:Ext.encode(f),
            fields:Ext.encode(d),
            source_db:g,
            source_table:e
        },function(h){
            if(h.success){
                Ext.Msg.show({
                    title:"Success",
                    msg:h.msg,
                    buttons:Ext.Msg.OK,
                    fn:a.handlePostDuplicate.createCallback(h.source_db,h.source_table,h.new_table),
                    animEl:document.body,
                    icon:Ext.MessageBox.INFO
                })
            }
            if(!h.success){
                Dbl.Utils.showErrorMsg(h.msg,"")
            }
        },function(j){
            var h=j.msg?j.msg:j;
            Dbl.Utils.showErrorMsg(h,"")
        })
    },
    handlePostDuplicate:function(a,c,b){
        Ext.getCmp("duplicate_table_window").close();
        Explorer.reset();
        Explorer.selectedNodeType="table";
        Explorer.loadExplorerData(a,b,"table")
    },
    closeWindow:function(){
        Ext.getCmp("duplicate_table_window").close()
    }
});
Dbl.EditIndexFormPanel=function(g){
    var h=Ext.getCmp("manage_index_grid");
    var b=h.table_columns;
    var f=new Ext.data.ArrayStore({
        fields:["value"],
        data:b,
    });
    var e=new Array();
    var j=h.store.getAt(g);
    var c=j.data.columns;
    if(c){
        c=c.split(",");
        if(c.length){
            for(var d=0;d<c.length;d++){
                e.push([c[d]])
            }
        }
    }
    var a=new Ext.data.ArrayStore({
        fields:["value"],
        data:e,
    });
    Dbl.EditIndexFormPanel.superclass.constructor.call(this,{
        id:"edit_index_form",
        border:false,
        frame:true,
        labelAlign:"top",
        hideLabel:true,
        defaults:{
            anchor:"100%"
        },
        items:[{
            xtype:"itemselector",
            name:"selected_columns",
            imagePath:"../app/images/itemselector/",
            availableLegend:"Available",
            selectedLegend:"Selected",
            multiselects:[{
                width:225,
                height:150,
                displayField:"value",
                valueField:"value",
                store:f,
            },{
                width:225,
                height:150,
                displayField:"value",
                valueField:"value",
                store:a
            }]
        }]
    })
};

Ext.onReady(function(){
    Ext.extend(Dbl.EditIndexFormPanel,Ext.FormPanel,{
        getSelectedColumns:function(d){
            var b=Ext.getCmp("edit_index_form");
            var c=Ext.getCmp("manage_index_grid");
            if(b.getForm().isValid()){
                var a=b.getForm().getValues();
                c.changeCellData(a.selected_columns,d)
            }
        },
        cancelEdit:function(){
            Ext.getCmp("edit_index_window").close()
        }
    })
});
var Editor={
    restoring:true,
    browserPanel:"",
    containerPanel:"",
    tabPanel:"",
    editorPanel:"",
    editorToolbar:"",
    editorTabCounter:0,
    editorList:"",
    defaultSQLDelimiter:";",
    init:function(){
        this.tabPanel=new Ext.TabPanel({
            region:"center",
            split:true,
            activeItem:0,
            resizeTabs:true,
            minTabWidth:100,
            border:false,
            bodyStyle:{
                borderRightWidth:"1px"
            },
            enableTabScroll:true,
            items:[],
            plugins:[new Ext.ux.TabCloseMenu({
                editor:this
            }),Ext.ux.AddTabButton],
            createTab:function(){
                if(Dblite.guest_user){
                // Editor.promptToLogin()
                }else{
                    Editor.addEditor("")
                }
            },
            listeners:{
                tabchange:this.handleEditorChange,
                scope:this
            }
        });
        this.browserContainerPanel=new Ext.Panel({
            title:"SQL Browser",
            id:"sql_browser_panel",
            region:"east",
            layout:"fit",
            width:Dbl.UserSettings.sqlBrowserWidth,
            minWidth:200,
            maxWidth:400,
            border:false,
            bodyStyle:{
                borderLeftWidth:"1px"
            },
            collapsible:true,
            collapsed:Dbl.UserSettings.sqlBrowserCollapsed,
            split:true,
            items:[],
            listeners:{
                resize:Dbl.UserActivity.pageLayout.resizeSQLBrowserPanel,
                collapse:Dbl.UserActivity.pageLayout.collapseSQLBrowserPanel,
                expand:Dbl.UserActivity.pageLayout.expandSQLBrowserPanel
            }
        });
        this.containerPanel=new Ext.Panel({
            header:false,
            collapsible:true,
            region:"center",
            margins:"0 2 0 0",
            layout:"border",
            border:true,
            bodyStyle:{
                borderTopWidth:"0px"
            },
            items:[this.tabPanel,this.browserContainerPanel],
            listeners:{
                resize:Dbl.UserActivity.pageLayout.resizeEditorPanel
            }
        });
        this.refreshBrowserPanel();
        this.addEditor()
    },
    refreshBrowserPanel:function(){
        Server.sendCommand("editor.get_saved_queries",{
            scope:this
        },function(a){
            Editor.browserContainerPanel.removeAll();
            Editor.browserPanel=new Dbl.SQLBrowserPanel(a);
            Editor.browserPanel.attachNodeEditor(Editor.browserPanel);
            Editor.browserContainerPanel.add(Editor.browserPanel);
            Editor.browserContainerPanel.doLayout()
        })
    },
    addEditor:function(c){
        var b=++Editor.editorTabCounter;
        Editor.addEditorPanel(b,c);
        var a=Editor.tabPanel.findById("editor_"+b);
        a.saved=false;
        a.foldername="";
        a.filename="";
        Editor.tabPanel.activate(a);
        a.doLayout()
    },
    addEditorPanel:function(a,b){
        this.editorPanel={
            title:"SQL<sup>*</sup>",
            tabTip:"SQL<sup>*</sup>",
            id:"editor_"+a,
            xtype:"uxCodeMirrorPanel",
            parser:"sql",
            layout:"fit",
            closable:true,
            closeAction:"destroy",
            sourceCode:b,
            keys:[{
                key:"e",
                alt:true,
                handler:function(){
                    Editor.handleExecuteQuery()
                }
            }],
            codeMirror:{
                height:"100%",
                width:"100%",
                clickHandler:function(){
                    Ext.menu.MenuMgr.hideAll()
                },
                saveFunction:function(){
                    Editor.saveCurrentEditor()
                },
                onChange:function(){
                    Editor.handleEditareaChange(a)
                },
                executeFunction:function(){
                    Topmenu.disableExecuteButton();
                    Editor.handleExecuteQuery()
                },
            },
            listeners:{
                beforeclose:Editor.handleBeforeEditorClose,
                removed:Editor.handleAfterEditorRemoved,
                scope:this
            }
        };

        Editor.tabPanel.add(this.editorPanel);
        Editor.tabPanel.doLayout()
    },
    restore:function(){
        var a=Ext.decode(Dbl.UserActivity.keys.editorTabList);
        var b=a instanceof Array;
        if(!b){
            Editor.restoring=false;
            return
        }else{
            if(!a.length){
                Editor.restoring=false;
                return
            }else{
                Server.sendCommand("user.get_queryfiles_content",{
                    editors:Dbl.UserActivity.keys.editorTabList
                },function(c){
                    if(c.editors.length){
                        Editor.restoreSqlEditors(c.editors)
                    }
                },function(d){
                    Editor.restoring=false;
                    var c=d.msg?d.msg:d;
                    Dbl.Utils.showErrorMsg(c,"")
                })
            }
        }
    },
    getCurrentSql:function(c){
        var e=Editor.defaultSQLDelimiter;
        var f=c.cursorPosition();
        var h=f.line;
        var b=c.lineContent(f.line);
        var d=b.substring(0,f.character);
        var a=b.substring(f.character);
        var g=h;
        if(d.indexOf(e)>=0){
            d=d.substring(d.lastIndexOf(e))
        }else{
            do{
                g=c.prevLine(g);
                if(g){
                    b=c.lineContent(g);
                    if(b){
                        if(b.indexOf(e)!=-1){
                            b=b.substring(b.lastIndexOf(e));
                            d=b+d;
                            break
                        }else{
                            d=b+d
                        }
                    }
                }
            }while(g)
        }
        g=h;
        if(a.indexOf(e)>=0){
            a=a.substring(0,a.indexOf(e))
        }else{
            do{
                g=c.nextLine(g);
                if(g){
                    b=c.lineContent(g);
                    if(b){
                        if(b.indexOf(e)!=-1){
                            b=b.substring(0,b.indexOf(e));
                            a=a+b;
                            break
                        }else{
                            a=a+b
                        }
                    }
                }
            }while(g)
        }
        return d+a
    },
    handleExecuteQuery:function(){
        var c=Editor.tabPanel.getActiveTab();
        var b=c.getSelection();
        if(b==""){
            var a=c.codeMirrorEditor;
            sql=Editor.getCurrentSql(a)
        }else{
            sql=b
        }
        if((sql=="")||(sql==Editor.defaultSQLDelimiter)){
            var d={
                hasError:true,
                msg:"No query(s)were executed. Please enter a query in the SQL editor or place the cursor inside a query.",
                sql:""
            };
        
            Dblite.dataPanel.addNewResultTabs([d])
        }else{
            Editor.executeQuery(sql)
        }
    },
    executeQuery:function(a){
        Editor.deleteResultFiles();
        Server.sendCommand("database.execute_queries",{
            sql:a,
            sqldelim:Editor.defaultSQLDelimiter
        },function(c){
            Dblite.dataPanel.addNewResultTabs(c);
            var b=Editor.tabPanel.getActiveTab().editortype;
            if((b=="view_editor")||(b=="procedure_editor")||(b=="function_editor")){
                Explorer.explorerPanel.removeAll();
                Explorer.loadExplorerData(Dbl.UserActivity.getValue("database"),Dbl.UserActivity.getValue("table"),"table")
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"")
        })
    },
    restoreEditor:function(e,c,d){
        var b=++Editor.editorTabCounter;
        Editor.addEditorPanel(b,e);
        var a=Editor.tabPanel.findById("editor_"+b);
        a.saved=true;
        a.foldername=d;
        a.filename=c;
        a.setTitle(c);
        Ext.fly(a.tabEl).child("span.x-tab-strip-text",true).qtip=c;
        Editor.tabPanel.activate(a);
        a.doLayout()
    },
    saveCurrentEditor:function(e){
        var a=this.tabPanel.getActiveTab();
        var d=a.filename;
        var b=a.foldername;
        if(!d){
            this.saveCurrentEditorAs(e)
        }else{
            var c=a.getValue();
            Server.sendCommand("editor.save_sql_editor",{
                sql:c,
                folder_name:b,
                file_name:d,
                replace:"REPLACE"
            },function(f){
                if(f.success){
                    a.setTitle(d);
                    Ext.fly(a.tabEl).child("span.x-tab-strip-text",true).qtip=d;
                    a.saved=true;
                    if(e){
                        Editor.tabPanel.remove(a)
                    }
                }
            })
        }
    },
    saveCurrentEditorAs:function(j){
        var d=this.tabPanel.getActiveTab();
        var b=d.filename;
        var k=d.foldername;
        var c=this.browserPanel.getRootNode().childNodes[0].childNodes;
        var e=[];
        for(var g=0;g<c.length;g++){
            var f=c[g];
            if(!f.leaf){
                e.push([f.text])
            }
        }
        var a=new Dbl.SaveAsPanel(e,j,b,k);
        var h=new Ext.Window({
            id:"editor_save_window",
            title:"Save As",
            width:320,
            closable:true,
            draggable:true,
            resizable:false,
            plain:true,
            border:true,
            stateful:true,
            bodyBorder:true,
            modal:true,
            closeAction:"destroy",
            stateful:true,
            items:[a]
        });
        h.show()
    },
    editorSaveForm:function(c,e){
        var d=Editor.tabPanel.getActiveTab();
        var b=d.getValue();
        var a=Ext.getCmp("editor_save_form").getForm().getFieldValues();
        Server.sendCommand("editor.save_sql_editor",{
            sql:b,
            replace:c?"REPLACE":"",
            file_name:a.file_name,
            folder_name:a.folder_name,
            scope:this
        },function(j){
            if(j.success){
                Ext.getCmp("editor_save_window").destroy();
                var h=j.filename;
                var f=j.foldername;
                d.setTitle(h);
                Ext.fly(d.tabEl).child("span.x-tab-strip-text",true).qtip=h;
                d.foldername=f;
                d.filename=h;
                d.saved=true;
                if(e){
                    Editor.tabPanel.remove(d)
                }
                Editor.refreshBrowserPanel();
                Editor.handleEditorChange()
            }else{
                if(!j.success){
                    if(j.duplicate){
                        var g=j.msg+Messages.getMsg("replace_editor_content");
                        Ext.Msg.confirm("Confirmation",g,function(k,l){
                            if(k=="yes"){
                                Editor.editorSaveForm(true,e)
                            }else{
                                if(k=="no"){
                                    Ext.getCmp("editor_save_window").destroy()
                                }
                            }
                        })
                    }
                }
            }
        })
    },
    handleBeforeEditorClose:function(a){
        if(Dblite.guest_user){
            //  Editor.promptToLogin();
            return false
        }
        var b=a.getValue();
        if(!a.saved&&b){
            Ext.Msg.confirm("Confirmation",Messages.getMsg("close_editor"),function(c){
                if(c=="yes"){
                    Editor.saveCurrentEditor(true)
                }
                if(c=="no"){
                    Editor.tabPanel.remove(a)
                }
            });
            return false
        }
    },
    handleAfterEditorRemoved:function(a){
        if(!Editor.restoring&&!Editor.tabPanel.items.length){
            Editor.editorTabCounter=0;
            Editor.addEditor();
            Editor.browserPanel.getSelectionModel().clearSelections()
        }
        Editor.handleEditorChange()
    },
    handleEditareaChange:function(b){
        var a=Editor.tabPanel.getActiveTab().editortype;
        if((a=="view_editor")||(a=="procedure_editor")||(a=="function_editor")){
            return
        }
        var d=Editor.tabPanel.findById("editor_"+b);
        var c=d.title;
        if(d.saved){
            this.saveCurrentEditor(false)
        }
        d.saved=false
    },
    promptBeforeLeave:function(a){
        Editor.deleteResultFiles();
        if(!Editor.tabPanel.items.length){
            return
        }
        for(var c=0;c<Editor.tabPanel.items.length;c++){
            var d=Editor.tabPanel.items.items[c];
            if(!d.saved){
                var b=d.getValue();
                if(!b){
                    continue
                }
                return Messages.getMsg("prompt_before_leave")
            }
        }
    },
    handleEditorChange:function(j,a){
        if(!Editor.tabPanel.items.length){
            return
        }
        var c=Editor.tabPanel.getActiveTab();
        c.setHeight(c.getHeight()+1);
        Editor.editorList=[];
        for(var g=0;g<Editor.tabPanel.items.length;g++){
            var h=Editor.tabPanel.items.items[g];
            if(h.saved){
                var e=h.id;
                var f={
                    sqlfile:h.filename,
                    sqlfolder:h.foldername,
                    isactive:(c.id==e)?true:false
                };
                
                Editor.editorList.push(f)
            }
        }
        Dbl.UserActivity.editorsPanel.tabChanged();
        if(Editor.browserPanel){
            var b=(c.foldername)?("file="+c.foldername+"."+c.filename):("file="+c.filename);
            var d=Editor.browserPanel.getNodeById(b);
            if(d){
                Editor.browserPanel.getSelectionModel().select(d)
            }
        }
    },
    restoreSqlEditors:function(f){
        Editor.tabPanel.removeAll();
        var e="";
        for(var a=0;a<f.length;a++){
            var b=f[a];
            var d=(!b.content||(b.content=="null"))?"":b.content;
            Editor.restoreEditor(d,b.sqlfile,b.sqlfolder);
            if(b.isactive){
                var e=Editor.tabPanel.getActiveTab()
            }
        }
        Editor.restoring=false;
        if(e){
            Editor.tabPanel.activate(e);
            var g=(e.foldername)?("file="+e.foldername+"."+e.filename):("file="+e.filename);
            var c=Editor.browserPanel.getNodeById(g);
            if(c){
                c.select()
            }
        }
    },
    deleteEditorConfirmation:function(){
        var a=Editor.tabPanel.getActiveTab();
        var c=a.filename;
        var b=a.foldername;
        var d=this;
        if(c&&Editor.tabPanel.items.length){
            Ext.Msg.confirm("Confirmation",Messages.getMsg("delete_editor",["editor"]),function(e){
                if(e=="yes"){
                    var f=(b)?("file="+b+"."+c):("file="+c);
                    Editor.deleteQueryEditor(a,c,b,f)
                }
            })
        }
    },
    deleteQueryEditor:function(b,a,c,d){
        Server.sendCommand("editor.delete_query_editor",{
            file:a,
            folder:c
        },function(m){
            if(m.success){
                if(b){
                    Editor.tabPanel.remove(b);
                    if(b.id!=Editor.tabPanel.getActiveTab().id){
                        Editor.handleEditorChange()
                    }
                }
                var k=m.files;
                if(k){
                    for(var g=0;g<k.length;g++){
                        var f=k[g];
                        for(var e=0;e<Editor.tabPanel.items.length;e++){
                            var h=Editor.tabPanel.items.items[e];
                            if((h.foldername==c)&&(h.filename==f)){
                                Editor.tabPanel.remove(h)
                            }
                        }
                    }
                    Editor.handleEditorChange()
                }
                var l=Editor.browserPanel.getNodeById(d);
                l.remove()
            }
        })
    },
    browseSavedEditor:function(){
        if(this.browserPanel.isVisible()){
            return
        }else{
            this.browserPanel.show();
            this.browserPanel.expand(true)
        }
    },
    showSQLDelimiterWindow:function(){
        Dblite.window=new Dbl.ContextMenuWindow({
            title:"Set Delimiter",
            id:"sql_dlimiter_window",
            width:350,
            height:120,
            resizable:false,
            layout:"fit",
            modal:true,
            plain:true,
            stateful:true,
            onEsc:function(){},
            items:[new Dbl.SQLDelimiterPanel()]
        });
        Dblite.window.show()
    },
    promptToLogin:function(){
        this.win=new Dbl.ContextMenuWindow({
            title:"Hi Guest...",
            id:"prompt_user_login",
            width:300,
            height:150,
            resizable:false,
            layout:"border",
            modal:true,
            plain:true,
            stateful:true,
            onEsc:function(){},
            items:[{
                region:"center",
                layout:"fit",
                html:"You must be logged in to do that.",
                frame:true,
                border:false,
                padding:5,
                buttons:[{
                    text:"Login",
                    handler:function(){
                        Ext.getCmp("prompt_user_login").close();
                    // Topmenu.showLoginWindow()
                    }
                },{
                    xtype:"tbtext",
                    text:"or"
                },{
                    text:"Register",
                    handler:function(){
                        Ext.getCmp("prompt_user_login").close();
                        Topmenu.showRegisterWindow()
                    }
                },]
            }]
        });
        this.win.show()
    },
    deleteResultFiles:function(a){
        Server.sendCommand("server.delete_result_files",{
            file:a
        },function(b){},function(b){})
    },
    executeCurrentQuery:function(){
        Topmenu.disableExecuteButton();
        Editor.handleExecuteQuery()
    },
    saveSQLEditor:function(){
        this.saveCurrentEditor(false)
    }
};

var Explorer={
    selectedDatabase:"",
    selectedTable:"",
    selectedView:"",
    selectedColumn:"",
    selectedNodeType:"",
    explorerData:{},
    explorerPanel:"",
    explorerTreePanelObj:"",
    restoring:true,
    win:"",
    selectedDatabaseTables:new Array(),
    selectedDatabaseColumns:new Array(),
    reset:function(){
        Explorer.explorerPanel.removeAll();
        Explorer.selectedDatabase="";
        Explorer.selectedTable="";
        Explorer.selectedNodeType=""
    },
    restore:function(){
        Explorer.restoring=true;
        var a=Dbl.UserActivity.getValue("connection");
        var d=Dbl.UserActivity.getValue("database");
        var c=Dbl.UserActivity.getValue("table");
        var b=Dbl.UserActivity.getValue("table_type");
        if(!a){
            Explorer.restoring=false;
            return
        }
        Ext.getCmp("server-connections").setValue(a);
        Explorer.loadExplorerData(d,c,b,function(){
            Explorer.restoring=false
        })
    },
    init:function(){
        Explorer.win=new Dbl.ServerWindow();
        Explorer.win.show();
        Explorer.win.hide();
        Explorer.explorerPanel=new Ext.Panel({
            title:"Database Explorer",
            id:"database_explorer_panel",
            region:"west",
            margins:"0 0 0 2",
            width:Dbl.UserSettings.explorerWidth,
            minSize:250,
            maxSize:400,
            split:true,
            layout:"fit",
            border:false,
            style:{
                borderWidth:"0px",
                borderRightWidth:"1px"
            },
            collapsible:true,
            collapsed:Dbl.UserSettings.explorerCollapsed,
            tools:[],
            tbar:{
                border:false,
                items:[new Ext.form.ComboBox({
                    id:"server-connections",
                    store:Dblite.connectionComboStore,
                    displayField:"connection_id",
                    valueField:"connection_id",
                    typeAhead:true,
                    mode:"local",
                    triggerAction:"all",
                    emptyText:"Select a connection...",
                    selectOnFocus:true,
                    width:135,
                    listeners:{
                        select:function(c,a,b){
                            if(a.data.show_new_conn_window===true){
                                Explorer.showServerWindow(true);
                                return
                            }
                            Explorer.connectionChanged(a.data.connection_id,a.data.database)
                        }
                    }
                }),{
                    id:"explorer_loading_btn",
                    iconCls:"explorer_loading",
                    tooltip:"Loading database explorer...",
                    hidden:true,
                },"->",{
                    id:"new_connection",
                    iconCls:"add_server",
                    tooltip:"New connection",
                    handler:Explorer.showServerWindow
                },{
                    id:"manage_connections",
                    iconCls:"edit_server",
                    tooltip:"Manage connections",
                    handler:Explorer.showServerWindow
                }]
            },
            items:[],
            listeners:{
                resize:Dbl.UserActivity.pageLayout.resizeExplorerPanel,
                collapse:Dbl.UserActivity.pageLayout.collapseExplorerPanel,
                expand:Dbl.UserActivity.pageLayout.expandExplorerPanel
            }
        })
    },
    showServerWindow:function(c){
        var a=false;
        if(c===true){
            var a=true
        }else{
            if(c.el.id=="new_connection"){
                var a=true
            }
        }
        Explorer.win.show();
        var d=Ext.getCmp("server-form");
        if(a){
            Explorer.windowType="add";
            d.newConnection()
        }else{
            Explorer.windowType="edit";
            var b=Ext.getCmp("server-connection-grid");
            b.updateButtonsStatus();
            b.getSelectionModel().selectFirstRow();
            b.doLayout()
        }
    },
    connectionChanged:function(a,b){
        Server.sendCommand("connection.should_prompt_password",{
            newConnectionId:a
        },function(c){
            if(c.shouldPrompt===true){
                Explorer.promptConnectionPassword(a,b)
            }else{
                Explorer.proceedServerChange(a,b)
            }
        })
    },
    proceedServerChange:function(a,b){
        Ext.getCmp("server-connections").setValue(a);
        Server.serverChanged(a,b);
        Explorer.reset();
        Explorer.loadExplorerData()
    },
    explorerTreePanel:function(a){
        Explorer.explorerTreePanel.superclass.constructor.call(this,{
            id:"explorer_tree_panel",
            autoScroll:true,
            animate:true,
            animCollapse:true,
            rootVisible:false,
            useArrows:true,
            layout:"fit",
            border:false,
            root:new Ext.tree.AsyncTreeNode({
                text:"explorer",
                id:"root",
                children:a,
                listeners:{
                    append:this.nodeAppended,
                    scope:this
                }
            }),
            keys:[{
                key:Ext.EventObject.F5,
                handler:this.handleNodeRefresh,
                stopEvent:true,
                scope:this
            }],
            selModel:new Ext.tree.DefaultSelectionModel({
                listeners:{
                    selectionchange:function(b,c){},
                    scope:this
                }
            }),
            listeners:{
                afterrender:this.handleAfterRender,
                contextmenu:this.onContextMenu,
                click:this.handleClickNode,
                expandnode:this.handleExpandNode,
                scope:this
            },
            loader:new Ext.tree.TreeLoader({
                dataUrl:" ",
                preloadChildren:false,
                listeners:{
                    beforeload:function(c,b){
                        if(b.ui.iconNode){
                            b.ui.iconNode.className="x-tree-node-icon loading_icon"
                        }
                        this.loadNodeData(b);
                        b.select();
                        return false
                    },
                    scope:this
                }
            })
        })
    },
    loadExplorerData:function(c,b,a,d){
        Ext.getCmp("explorer_loading_btn").show();
        if(b){
            Dbl.UserActivity.explorerPanel.newTableSelected(b,c,a)
        }else{
            if(c){
                Dbl.UserActivity.explorerPanel.newDatabaseSelected(c)
            }
        }
        Database.sendCommand("cache_explorer_data",{
            connectiondb:Dbl.UserActivity.getValue("connection_db"),
            dbname:Dbl.UserActivity.getValue("database"),
            tablename:Dbl.UserActivity.getValue("table")
        },function(){
            Explorer.explorerTreePanelObj=new Explorer.explorerTreePanel();
            Explorer.explorerPanel.add(Explorer.explorerTreePanelObj);
            Explorer.explorerPanel.doLayout();
            var f=null;
            if(b){
                var e="t="+c+"."+b;
                f=Explorer.explorerTreePanelObj.getNodeById(e)
            }else{
                if(c){
                    var g="d="+c;
                    f=Explorer.explorerTreePanelObj.getNodeById(g);
                    f.firstChild.expand();
                    f.select()
                }
            }
            if(f){
                Explorer.scrollNodeIntoView(f)
            }
            Ext.getCmp("explorer_loading_btn").hide()
        });
        if(d){
            d()
        }
    },
    scrollNodeIntoView:function(a){
        if(a){
            if(a.nextSibling){
                a.nextSibling.ensureVisible();
                if(a.previousSibling){
                    a.previousSibling.ensureVisible();
                    a.ensureVisible()
                }else{
                    a.ensureVisible()
                }
            }else{
                a.ensureVisible()
            }
        }
    },
    getDbTablesAndColumns:function(){
        Server.sendCommand("get_dbtables_columns",{},function(a){
            if(a.success){
                Explorer.selectedDatabaseTables=a.tables;
                Explorer.selectedDatabaseColumns=a.tables
            }
        },function(b){
            var a=b.msg?b.msg:b;
            Dbl.Utils.showErrorMsg(a,"")
        })
    },
    promptConnectionPassword:function(a,b){
        Dblite.window=new Dbl.ContextMenuWindow({
            title:"Connection Password",
            id:"connection_password_window",
            width:350,
            height:120,
            resizable:false,
            layout:"fit",
            modal:true,
            plain:true,
            stateful:true,
            frame:true,
            onEsc:function(){},
            items:[new Dbl.ConnectionPasswordPanel(a,b)]
        });
        Dblite.window.show()
    },
    refreshDatabaseExplorer:function(){
        Explorer.explorerTreePanelObj.handleNodeRefresh()
    },
    alterTableStructure:function(){
        Explorer.explorerTreePanelObj.manageTableColumns()
    },
    alterTableIndexes:function(){
        Explorer.explorerTreePanelObj.manageTableIndexes()
    },
    showHideDatabaseExplorer:function(){
        if(Explorer.explorerPanel.collapsed){
            Explorer.explorerPanel.expand(true)
        }else{
            Explorer.explorerPanel.collapse(true)
        }
    },
    showCreateDBPanel:function(){
        ExplorerMenuItems.showCreateDBWindow()
    }
};

Ext.extend(Explorer.explorerTreePanel,Ext.tree.TreePanel,{
    nodeAppended:function(a,b,c){
        if(c.attributes.category=="connection"){
            this.loadNodeData(c)
        }else{
            if(c.attributes.category=="table"&&c.id==Dbl.UserActivity.getValue("table")){
                Explorer.scrollNodeIntoView(c)
            }
        }
    },
    handleNodeRefresh:function(){
        var a=this.getSelectionModel().getSelectedNode();
        if(a.attributes.category=="connection"){
            Explorer.explorerPanel.removeAll();
            Explorer.restore()
        }else{
            if(a.attributes.category=="database"){
                Explorer.explorerPanel.removeAll();
                Explorer.loadExplorerData(a.text)
            }
        }
    },
    manageTableColumns:function(){
        var a=this.getSelectionModel().getSelectedNode();
        if(a.attributes.category=="table"){
            Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
            Dbl.UserActivity.setKey("activeTableTab","column_info");
            Dblite.dataPanel.refresh(true)
        }
    },
    manageTableIndexes:function(){
        var a=this.getSelectionModel().getSelectedNode();
        if(a.attributes.category=="table"){
            Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
            Dbl.UserActivity.setKey("activeTableTab","index_info");
            Dblite.dataPanel.refresh(true)
        }
    },
    loadNodeData:function(a){
        if(a.attributes.category=="connection"){
            Database.sendCommand("get_server_databases",{
                scope:this,
                connectiondb:Dbl.UserActivity.getValue("connection_db")
            },function(e){
                var d=e.result;
                for(var b=0;b<d.length;b++){
                    var c={
                        category:"database",
                        id:"d="+d[b][0],
                        text:d[b][0],
                        cls:"database_node",
                        category:"database",
                        iconCls:"database",
                        expanded:false
                    };
                
                    if(Dbl.UserActivity.getValue("database")==d[b][0]){
                        c.restoring=true;
                        c.expanded=true
                    }
                    a.appendChild(c)
                }
            });
            if(a.ui.iconNode){
                a.ui.iconNode.className="x-tree-node-icon connection"
            }
        }else{
            if(a.attributes.category=="database"){
                a.appendChild(this.getDatabaseNodes(a));
                if(a.ui.iconNode){
                    a.ui.iconNode.className="x-tree-node-icon database"
                }
            }else{
                if(a.attributes.category=="tables"){
                    Database.sendCommand("get_db_tables",{
                        dbname:a.parentNode.text,
                        scope:this
                    },function(e){
                        var c=e.result;
                        for(var b=0;b<c.length;b++){
                            var d={
                                category:"table",
                                id:"t="+a.parentNode.text+"."+c[b][0],
                                text:c[b][0],
                                cls:"table_node",
                                iconCls:"table",
                                expanded:false,
                                listeners:{
                                    append:this.nodeAppended,
                                    scope:this
                                }
                            };
                
                            if(Dbl.UserActivity.getValue("table")==c[b][0]&&Dbl.UserActivity.getValue("database")==a.parentNode.text){
                                d.restoring=true;
                                d.expanded=true
                            }
                            a.appendChild(d)
                        }
                        if(a.ui.iconNode){
                            a.ui.iconNode.className="x-tree-node-icon table_group"
                        }
                    })
                }else{
                    if(a.attributes.category=="views"){
                        Database.sendCommand("get_db_views",{
                            dbname:a.parentNode.text
                        },function(f){
                            var b=f.result;
                            var d=[];
                            for(var c=0;c<b.length;c++){
                                var e={
                                    category:"view",
                                    id:"v="+a.parentNode.text+"."+b[c][0],
                                    text:b[c][0],
                                    cls:"table_node",
                                    iconCls:"database_view",
                                    leaf:(Dbl.UserActivity.getValue("table")==b[c][0])?false:true
                                };
                    
                                if(Dbl.UserActivity.getValue("table")==b[c][0]&&Dbl.UserActivity.getValue("database")==a.parentNode.text){
                                    e.restoring=true;
                                    e.expanded=true
                                }
                                a.appendChild(e)
                            }
                            if(a.ui.iconNode){
                                a.ui.iconNode.className="x-tree-node-icon database_views"
                            }
                        })
                    }else{
                        if(a.attributes.category=="procedures"){
                            Database.sendCommand("get_db_procedures",{
                                dbname:a.parentNode.text
                            },function(e){
                                var f=e.result;
                                var c=[];
                                for(var b=0;b<f.length;b++){
                                    var d={
                                        category:"procedure",
                                        id:"p="+a.parentNode.text+"."+f[b][0],
                                        text:f[b][0],
                                        cls:"table_node",
                                        iconCls:"database_procedure",
                                        leaf:true
                                    };
                
                                    a.appendChild(d)
                                }
                                if(a.ui.iconNode){
                                    a.ui.iconNode.className="x-tree-node-icon stored_procedures"
                                }
                            })
                        }else{
                            if(a.attributes.category=="functions"){
                                Database.sendCommand("get_db_functions",{
                                    dbname:a.parentNode.text
                                },function(d){
                                    var e=d.result;
                                    for(var b=0;b<e.length;b++){
                                        var c={
                                            category:"function",
                                            id:"f="+a.parentNode.text+"."+e[b][0],
                                            text:e[b][0],
                                            cls:"table_node",
                                            iconCls:"database_function",
                                            leaf:true
                                        };
                
                                        a.appendChild(c)
                                    }
                                    if(a.ui.iconNode){
                                        a.ui.iconNode.className="x-tree-node-icon database_functions"
                                    }
                                })
                            }else{
                                if(a.attributes.category=="table"){
                                    Database.sendCommand("get_table_columns",{
                                        dbname:a.parentNode.parentNode.text,
                                        tablename:a.text
                                    },function(e){
                                        var c=e.result;
                                        for(var b=0;b<c.length;b++){
                                            var g=c[b][0];
                                            var f=c[b][0]+" ["+c[b][1]+"]";
                                            var d={
                                                category:"column",
                                                id:"c="+a.parentNode.parentNode.text+"."+a.text+"."+g,
                                                column_name:g,
                                                text:f,
                                                cls:"table_node",
                                                category:"column",
                                                iconCls:(c[b][2]=="PRI")?"primary_column":"table_column",
                                                leaf:true
                                            };
                
                                            a.appendChild(d)
                                        }
                                        if(a.ui.iconNode){
                                            a.ui.iconNode.className="x-tree-node-icon table"
                                        }
                                        Explorer.scrollNodeIntoView(a)
                                    })
                                }else{
                                    if(a.attributes.category=="view"){
                                        if(a.ui.iconNode){
                                            a.ui.iconNode.className="x-tree-node-icon database_view"
                                        }
                                    }else{}
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    getDatabaseNodes:function(c){
        var b={
            id:c.text+"_tables",
            category:"tables",
            text:"Tables",
            iconCls:"table_group",
            expanded:false,
            listeners:{
                append:this.nodeAppended,
                scope:this
            }
        };
    
        if(Dbl.UserActivity.getValue("database")==c.text&&Dbl.UserActivity.getValue("table")&&Dbl.UserActivity.getValue("table_type")=="table"){
            b.restoring=true;
            b.expanded=true
        }
        var d={
            id:c.text+"_views",
            category:"views",
            text:"Views",
            iconCls:"database_views",
            expanded:false,
            listeners:{
                append:this.nodeAppended,
                scope:this
            }
        };

        if(Dbl.UserActivity.getValue("database")==c.text&&Dbl.UserActivity.getValue("table")&&Dbl.UserActivity.getValue("table_type")=="view"){
            d.restoring=true;
            d.expanded=true
        }
        var a={
            id:c.text+"_stored_procedure",
            category:"procedures",
            text:"Stored Procs",
            iconCls:"stored_procedures",
            expanded:false
        };

        var e={
            id:c.text+"_functuions",
            category:"functions",
            text:"Functions",
            iconCls:"database_functions",
            expanded:false
        };

        return[b,d,a,e]
    },
    handleAfterRender:function(){
        var a=new Ext.tree.TreeNode({
            id:Server.connection_id,
            text:Server.connection_id,
            expanded:true,
            category:"connection",
            iconCls:"connection",
            listeners:{
                append:this.nodeAppended,
                scope:this
            }
        });
        this.getRootNode().appendChild(a)
    },
    onContextMenu:function(d,g){
        if((d.attributes.category!="connection")&&(d.attributes.category!="database")&&(d.attributes.category!="tables")&&(d.attributes.category!="table")&&(d.attributes.category!="column")&&(d.attributes.category!="views")&&(d.attributes.category!="view")&&(d.attributes.category!="procedures")&&(d.attributes.category!="procedure")&&(d.attributes.category!="functions")&&(d.attributes.category!="function")){
            return
        }
        d.fireEvent("click",d,g);
        if(this.menu){
            this.menu.removeAll()
        }
        var h=d.attributes.id;
        var c=d.attributes.text;
        var b=d.attributes.category;
        var a="";
        var f=[];
        if(b=="connection"){
            a=b+"_"+h+"-folder-node-ctx";
            f=[ExplorerMenuItems.refreshConnection(h,c),"-",ExplorerMenuItems.createDb(h,c),"-",ExplorerMenuItems.restoreDb(h,c)]
        }else{
            if(b=="database"){
                a=b+"_"+h+"-folder-node-ctx";
                f=[ExplorerMenuItems.refreshDb(h,c),"-",ExplorerMenuItems.createDb(h,c),ExplorerMenuItems.createTable(h,c),"-",ExplorerMenuItems.createView(h,c),ExplorerMenuItems.createProcedure(h,c),ExplorerMenuItems.createFunction(h,c),"-",ExplorerMenuItems.backupDb(h,c),ExplorerMenuItems.restoreDb(h,c),"-",ExplorerMenuItems.truncateDb(h,c),ExplorerMenuItems.emptyDb(h,c),ExplorerMenuItems.dropDb(h,c)]
            }else{
                if(b=="tables"){
                    Explorer.selectedNodeType=b;
                    a=b+"_"+h+"-folder-node-ctx";
                    f=[ExplorerMenuItems.createTable(h,c)]
                }else{
                    if(b=="table"){
                        Explorer.selectedNodeType=b;
                        Explorer.selectedTable=c;
                        Explorer.selectedColumn="";
                        Explorer.selectedColumnNodeId="";
                        a=b+"_"+h+"-folder-node-ctx";
                        f=[ExplorerMenuItems.alterTable(h,c),ExplorerMenuItems.manageIndexes(h,c),ExplorerMenuItems.createTable(h,c),"-",ExplorerMenuItems.exportTable(h,c),ExplorerMenuItems.duplicateTable(h,c),"-",ExplorerMenuItems.renameTable(h,c),ExplorerMenuItems.truncateTable(h,c),ExplorerMenuItems.reorderColumns(h,c),ExplorerMenuItems.dropTable(h,c),"-",ExplorerMenuItems.viewTableData(h,c),ExplorerMenuItems.viewAdvancedProperties(h,c)]
                    }else{
                        if(b=="column"){
                            Explorer.selectedColumn=d.attributes.column_name;
                            Explorer.selectedNodeType=b;
                            Explorer.selectedColumnNodeId=h;
                            a=b+"_"+h+"-folder-node-ctx";
                            f=[ExplorerMenuItems.manageColumns(h,c),ExplorerMenuItems.dropColumn(h,c)]
                        }else{
                            if(b=="views"){
                                a=b+"_"+h+"-folder-node-ctx";
                                f=[ExplorerMenuItems.createView(h,c)]
                            }else{
                                if(b=="view"){
                                    Explorer.selectedView=c;
                                    Explorer.selectedViewNodeId=h;
                                    a=b+"_"+h+"-folder-node-ctx";
                                    f=[ExplorerMenuItems.createView(h,c),ExplorerMenuItems.dropView(h,c)]
                                }else{
                                    if(b=="procedures"){
                                        a=b+"_"+h+"-folder-node-ctx";
                                        f=[ExplorerMenuItems.createProcedure(h,c)]
                                    }else{
                                        if(b=="procedure"){
                                            Explorer.selectedProcedure=c;
                                            Explorer.selectedProcedureId=h;
                                            a=b+"_"+h+"-folder-node-ctx";
                                            f=[ExplorerMenuItems.createProcedure(h,c),ExplorerMenuItems.dropProcedure(h,c)]
                                        }else{
                                            if(b=="functions"){
                                                a=b+"_"+h+"-folder-node-ctx";
                                                f=[ExplorerMenuItems.createFunction(h,c)]
                                            }else{
                                                if(b=="function"){
                                                    Explorer.selectedFunction=c;
                                                    Explorer.selectedFunctionId=h;
                                                    a=b+"_"+h+"-folder-node-ctx";
                                                    f=[ExplorerMenuItems.createFunction(h,c),ExplorerMenuItems.dropFunction(h,c)]
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        this.menu=new Ext.menu.Menu({
            id:a,
            items:f,
            defaults:{
                scale:"small",
                width:"100%",
                iconAlign:"left"
            }
        });
        this.menu.showAt(g.getXY())
    },
    handleExpandNode:function(b,c){
        if(b.attributes.category=="explorer"){
            return true
        }
        if(Explorer.selectedNode){
            var a=Explorer.selectedNode.parentNode;
            while(a){
                if(b.id==a.id){
                    return true
                }
                a=a.parentNode
            }
        }
        if(b.attributes.restoring){
            b.restoring=false
        }else{
            this.handleClickNode(b,c)
        }
    },
    handleClickNode:function(a,b){
        Explorer.selectedNode=a;
        Explorer.selectedNodeType=a.attributes.category;
        if(a.attributes.category=="database"){
            Dbl.UserActivity.explorerPanel.newDatabaseSelected(a.text);
            Ext.getCmp("tablestructure").setTitle("Table Structure")
        }else{
            if(a.attributes.category=="tables"){
                Dbl.UserActivity.explorerPanel.newDatabaseSelected(a.parentNode.text);
                Ext.getCmp("tablestructure").setTitle("Table Structure")
            }else{
                if(a.attributes.category=="table"){
                    Dbl.UserActivity.explorerPanel.newTableSelected(a.text,a.parentNode.parentNode.text,"table")
                }else{
                    if(a.attributes.category=="columns"){
                        Dbl.UserActivity.explorerPanel.newTableSelected(a.parentNode.text,a.parentNode.parentNode.parentNode.text,"table")
                    }else{
                        if(a.attributes.category=="column"){
                            Dbl.UserActivity.explorerPanel.newTableSelected(a.parentNode.text,a.parentNode.parentNode.parentNode.text,"table")
                        }else{
                            if(a.attributes.category=="views"){
                                Dbl.UserActivity.explorerPanel.newDatabaseSelected(a.parentNode.text);
                                Ext.getCmp("tablestructure").setTitle("Table Structure")
                            }else{
                                if(a.attributes.category=="view"){
                                    Dbl.UserActivity.explorerPanel.newTableSelected(a.text,a.parentNode.parentNode.text,"view")
                                }else{
                                    if(a.attributes.category=="procedures"){
                                        Dbl.UserActivity.explorerPanel.newDatabaseSelected(a.parentNode.text);
                                        Ext.getCmp("tablestructure").setTitle("Table Structure")
                                    }else{
                                        if(a.attributes.category=="procedure"){}else{
                                            if(a.attributes.category=="functions"){
                                                Dbl.UserActivity.explorerPanel.newDatabaseSelected(a.parentNode.text);
                                                Ext.getCmp("tablestructure").setTitle("Table Structure")
                                            }else{
                                                if(a.attributes.category=="function"){}
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        Explorer.selectedDbTable=Dbl.UserActivity.getValue("database")+"."+Dbl.UserActivity.getValue("table");
        if((Explorer.selectedDatabase!=Dblite.dataPanel.selectedDatabase)||(Explorer.selectedTable!=Dblite.dataPanel.selectedTable)){
            if(!Explorer.restoring){
                Dblite.dataPanel.reloadStructureData=true;
                Dblite.dataPanel.refresh()
            }
        }
    }
});
var ExplorerMenuItems={
    refreshConnection:function(b,a){
        return{
            itemId:"refresh_database_"+b,
            text:"Refresh Database Explorer...",
            iconCls:"refresh_connection",
            listeners:{
                click:function(d,c){
                    Explorer.explorerPanel.removeAll();
                    Explorer.restore()
                }
            }
        }
    },
    createDb:function(b,a){
        return{
            itemId:"create_database_"+b,
            text:"Create Database...",
            iconCls:"create_database",
            listeners:{
                click:function(d,c){
                    ExplorerMenuItems.showCreateDBWindow()
                }
            }
        }
    },
    restoreDb:function(b,a){
        return{
            itemId:"restore_database_"+b,
            text:"Restore From SQL Dump...",
            iconCls:"restore_server",
            listeners:{
                click:function(f,e){
                    var c=Dbl.UserActivity.getValue("database");
                    var d=c?c:"none";
                    this.win=new Dbl.ContextMenuWindow({
                        title:"Execute Query(s) from a File",
                        id:"restore_db_window",
                        width:300,
                        height:150,
                        items:[new RestoreDbPanel(d)]
                    });
                    this.win.show(e)
                }
            }
        }
    },
    refreshDb:function(b,a){
        return{
            itemId:"refresh_database_"+b,
            text:"Refresh Database Explorer...",
            iconCls:"refresh_database",
            listeners:{
                click:function(d,c){
                    Explorer.explorerPanel.removeAll();
                    Explorer.loadExplorerData(a)
                }
            }
        }
    },
    createTable:function(d,a,b,c){
        return{
            itemId:"create_table_"+d,
            text:"Create Table...",
            iconCls:"create_table",
            listeners:{
                click:function(f,e){
                    Server.sendCommand("get_table_creation_info",{
                        parent_database:Dbl.UserActivity.getValue("database")
                    },function(g){
                        if(g.success){
                            g.create_table=true;
                            g.alter_table=false;
                            Dblite.dataPanel.addCreateTableTab(g)
                        }else{
                            if(!g.success){
                                DbliteUtils.showErrorMsg(g.msg,"")
                            }
                        }
                    },function(h){
                        var g=h.msg?h.msg:h;
                        DbliteUtils.showErrorMsg(g,"")
                    })
                }
            }
        }
    },
    createView:function(b,a){
        return{
            itemId:"create_view_"+b,
            text:"Create View...",
            iconCls:"create_view",
            listeners:{
                click:function(d,c){
                    this.win=new Dbl.ContextMenuWindow({
                        title:"Create View",
                        id:"create_view_window",
                        width:300,
                        height:120,
                        resizable:false,
                        layout:"border",
                        modal:true,
                        plain:true,
                        stateful:true,
                        onEsc:function(){},
                        items:[{
                            id:"create_view",
                            region:"center",
                            xtype:"panel",
                            layout:"fit",
                            items:[new Dbl.CreateViewPanel("CREATE")]
                        }]
                    });
                    this.win.show()
                }
            }
        }
    },
    createProcedure:function(b,a){
        return{
            itemId:"create_procedure_"+b,
            text:"Create Stored Procedure...",
            iconCls:"create_procedure",
            listeners:{
                click:function(d,c){
                    this.win=new Dbl.ContextMenuWindow({
                        title:"Create Procedure",
                        id:"create_procedure_window",
                        width:350,
                        height:120,
                        resizable:false,
                        layout:"border",
                        modal:true,
                        plain:true,
                        stateful:true,
                        onEsc:function(){},
                        items:[{
                            id:"create_procedure",
                            region:"center",
                            xtype:"panel",
                            layout:"fit",
                            items:[new Dbl.CreateProcedurePanel()]
                        }]
                    });
                    this.win.show()
                }
            }
        }
    },
    createFunction:function(b,a){
        return{
            itemId:"create_function_"+b,
            text:"Create Function...",
            iconCls:"create_function",
            listeners:{
                click:function(d,c){
                    this.win=new Dbl.ContextMenuWindow({
                        title:"Create Function",
                        id:"create_function_window",
                        width:320,
                        height:120,
                        resizable:false,
                        layout:"border",
                        modal:true,
                        plain:true,
                        stateful:true,
                        onEsc:function(){},
                        items:[{
                            id:"create_function",
                            region:"center",
                            xtype:"panel",
                            layout:"fit",
                            items:[new Dbl.CreateFunctionPanel()]
                        }]
                    });
                    this.win.show()
                }
            }
        }
    },
    backupDb:function(b,a){
        return{
            itemId:"backup_database_"+b,
            text:"Backup Database As SQL Dump...",
            iconCls:"backup_database",
            listeners:{
                click:function(d,c){
                    Database.sendCommand("get_db_tables",{
                        dbname:a
                    },function(e){
                        e.curr_db=a;
                        this.win=new Dbl.ContextMenuWindow({
                            title:"View dump (schema) of database",
                            id:"backup_db_window",
                            width:650,
                            height:530,
                            items:[new Dbl.BackupDbPanel(e)]
                        });
                        this.win.show(c)
                    })
                }
            }
        }
    },
    truncateDb:function(b,a){
        return{
            itemId:"truncate_database_"+b,
            text:"Truncate Database...",
            iconCls:"truncate_database",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("truncate_database",[a]),function(e){
                        if(e=="yes"){
                            Dbl.Utils.showWaitMask();
                            Server.sendCommand("truncate_database",{
                                database:a
                            },function(f){
                                Dbl.Utils.hideWaitMask();
                                if(!f.success){
                                    Dbl.Utils.showErrorMsg(f.msg,"")
                                }
                            },function(g){
                                Dbl.Utils.hideWaitMask();
                                var f=g.msg?g.msg:g;
                                Dbl.Utils.showErrorMsg(f,"")
                            })
                        }
                    })
                }
            }
        }
    },
    emptyDb:function(b,a){
        return{
            itemId:"empty_database_"+b,
            text:"Empty Database...",
            iconCls:"empty_database",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("empty_database",[a]),function(e){
                        if(e=="yes"){
                            Dbl.Utils.showWaitMask();
                            Server.sendCommand("empty_database",{
                                database:a
                            },function(f){
                                if(f.success){
                                    Dbl.Utils.hideWaitMask();
                                    Explorer.explorerPanel.removeAll();
                                    Explorer.loadExplorerData()
                                }else{
                                    if(!f.success){
                                        Dbl.Utils.showErrorMsg(f.msg,"")
                                    }
                                }
                            },function(g){
                                Dbl.Utils.hideWaitMask();
                                var f=g.msg?g.msg:g;
                                Dbl.Utils.showErrorMsg(f,"")
                            })
                        }
                    })
                }
            }
        }
    },
    dropDb:function(b,a){
        return{
            itemId:"delete_database_"+b,
            text:"Drop Database...",
            iconCls:"delete_database",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("drop_database",[a]),function(e){
                        if(e=="yes"){
                            Dbl.Utils.showWaitMask();
                            Database.sendCommand("drop_database",{
                                dbname:a
                            },function(g){
                                Dbl.Utils.hideWaitMask();
                                Explorer.explorerTreePanelObj.getNodeById("d="+a).remove();
                                Dbl.UserActivity.explorerPanel.newConnectionSelected(Dbl.UserActivity.getValue("connection"));
                                Ext.getCmp("dbstructure").setTitle("DB Structure");
                                for(var f=0;f<Database.databases.length;f++){
                                    if(Database.databases[f][0]==a){
                                        Database.databases.splice(f,1)
                                    }
                                }
                                Database.tables=[];
                                Database.columns=[]
                            })
                        }
                    })
                }
            }
        }
    },
    alterTable:function(b,a){
        return{
            itemId:"alter_table_"+b,
            text:"Alter Table / Manage Columns...",
            iconCls:"alter_table",
            listeners:{
                click:function(d,c){
                    Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
                    Dbl.UserActivity.setKey("activeTableTab","column_info");
                    Dblite.dataPanel.refresh(true)
                }
            }
        }
    },
    manageIndexes:function(b,a){
        return{
            itemId:"manage_index_new_"+b,
            text:"Manage Indexes...",
            iconCls:"manage_index",
            listeners:{
                click:function(d,c){
                    Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
                    Dbl.UserActivity.setKey("activeTableTab","index_info");
                    Dblite.dataPanel.refresh(true)
                }
            }
        }
    },
    exportTable:function(b,a){
        return{
            itemId:"export_as_"+b,
            text:"Export As...",
            iconCls:"copy_table",
            menu:{
                items:[this.exportTableAs(b,a),this.exportTableData(b,a)]
            }
        }
    },
    exportTableAs:function(b,a){
        return{
            itemId:"export_as_dump_"+b,
            text:"Export Table As SQL Dump...",
            iconCls:"backup_database",
            listeners:{
                click:function(d,c){
                    data={
                        result:[[a]]
                    };
                    
                    data.curr_db=Dbl.UserActivity.getValue("database");
                    data.current_table=a;
                    this.win=new Dbl.ContextMenuWindow({
                        title:"View dump (schema) of database",
                        id:"backup_db_window",
                        width:650,
                        height:530,
                        items:[new Dbl.BackupDbPanel(data)]
                    });
                    this.win.show(c)
                }
            }
        }
    },
    exportTableData:function(b,a){
        return{
            itemId:"export_table_"+b,
            text:"Export Table Data...",
            iconCls:"copy_table",
            listeners:{
                click:function(d,c){
                    Database.sendCommand("get_table_columns",{
                        tablename:a,
                        dbname:Dbl.UserActivity.getValue("database")
                    },function(e){
                        e.curr_table=a;
                        e.curr_db=Dbl.UserActivity.getValue("database");
                        this.win=new Dbl.ContextMenuWindow({
                            title:"Export Table",
                            id:"export_table",
                            width:560,
                            height:240,
                            onEsc:function(){},
                            items:[new Dbl.ExportTableDbPanel(e)]
                        });
                        this.win.show(c)
                    },function(f){
                        var e=f.msg?f.msg:f;
                        Dbl.Utils.showErrorMsg(e,"")
                    })
                }
            }
        }
    },
    duplicateTable:function(b,a){
        return{
            itemId:"duplicate_structure_data_"+b,
            text:"Duplicate Table Structure / Data...",
            iconCls:"duplicate_structure_data",
            listeners:{
                click:function(d,c){
                    Server.sendCommand("get_duplicate_table_info",{
                        database:Dbl.UserActivity.getValue("database"),
                        table:a
                    },function(g){
                        var e=new DuplicateTablePanel(g.database,g.table);
                        var f=new SelectableListViewPanel({
                            fields:g.fields,
                            data:g.data,
                            models:g.models,
                            autoExpandColumn:"Field",
                            id:"duplicate_table_grid",
                            height:180,
                            width:333,
                            autoScroll:true
                        });
                        this.win=new Dbl.ContextMenuWindow({
                            title:"Duplicate Table",
                            id:"duplicate_table_window",
                            headerAsText:true,
                            width:350,
                            height:407,
                            layout:"",
                            resizable:false,
                            modal:true,
                            plain:true,
                            stateful:true,
                            shadow:false,
                            onEsc:function(){},
                            closeAction:"destroy",
                            items:[e,f],
                            buttons:[{
                                text:"Copy",
                                handler:function(){
                                    e.validateAndDuplicateTable(g.database,g.table)
                                }
                            },{
                                text:"Cancel",
                                handler:function(){
                                    e.closeWindow()
                                }
                            }]
                        });
                        this.win.show()
                    })
                }
            }
        }
    },
    renameTable:function(b,a){
        return{
            itemId:"rename_table_"+b,
            text:"Rename Table...",
            iconCls:"rename_table",
            listeners:{
                click:function(d,c){
                    this.win=new Dbl.ContextMenuWindow({
                        title:"Rename Table",
                        id:"rename_table_window",
                        width:300,
                        height:120,
                        resizable:false,
                        layout:"border",
                        modal:true,
                        plain:true,
                        stateful:true,
                        items:[{
                            id:"rename_table",
                            region:"center",
                            xtype:"panel",
                            border:false,
                            layout:"fit",
                            items:[new RenameTablePanel(b,a)]
                        }]
                    });
                    this.win.show()
                }
            }
        }
    },
    truncateTable:function(b,a){
        return{
            itemId:"truncate_table_"+b,
            text:"Truncate Table...",
            iconCls:"truncate_table",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("truncate_table",[a]),function(e){
                        if(e=="yes"){
                            Dbl.Utils.showWaitMask();
                            Database.sendCommand("truncate_table",{
                                table:a,
                                database:Dbl.UserActivity.getValue("database")
                            },function(f){
                                Dbl.Utils.hideWaitMask();
                                if(f.success){
                                    Dblite.dataPanel.refresh(true)
                                }else{
                                    if(!f.success){
                                        Dbl.Utils.showErrorMsg(f.msg,"")
                                    }
                                }
                            },function(g){
                                Dbl.Utils.hideWaitMask();
                                var f=g.msg?g.msg:g;
                                Dbl.Utils.showErrorMsg(f,"")
                            })
                        }
                    })
                }
            }
        }
    },
    dropTable:function(b,a){
        return{
            itemId:"drop_table_"+b,
            text:"Drop Table...",
            iconCls:"drop_table",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("drop_table",[a]),function(e){
                        if(e=="yes"){
                            Dbl.Utils.showWaitMask();
                            Database.sendCommand("drop_table",{
                                table:a,
                                database:Dbl.UserActivity.getValue("database")
                            },function(g){
                                if(g.success){
                                    Dbl.Utils.hideWaitMask();
                                    Database.tables=[];
                                    Database.columns=[];
                                    Explorer.getDbTablesAndColumns();
                                    Dbl.UserActivity.explorerPanel.newDatabaseSelected(Dbl.UserActivity.getValue("database"));
                                    var h=Explorer.explorerTreePanelObj.getNodeById(b);
                                    var f=Explorer.explorerTreePanelObj.getNodeById(Dbl.UserActivity.getValue("database")+"_tables");
                                    h.remove();
                                    f.fireEvent("click",f)
                                }else{
                                    if(!g.success){
                                        Dbl.Utils.showErrorMsg(g.msg,"")
                                    }
                                }
                            })
                        }
                    })
                }
            }
        }
    },
    reorderColumns:function(b,a){
        return{
            itemId:"reorder_columns_"+b,
            text:"Reorder Columns...",
            iconCls:"reorder_columns",
            listeners:{
                click:function(d,c){
                    Server.sendCommand("get_table_columns_info",{
                        table:a
                    },function(f){
                        var e=new ReorderColumnsPanel(f);
                        this.win=new Dbl.ContextMenuWindow({
                            title:"Reorder Columns of '"+f.table+"'",
                            id:"reorder_columns_window",
                            headerAsText:true,
                            width:310,
                            height:416,
                            resizable:false,
                            modal:true,
                            plain:true,
                            stateful:true,
                            closable:false,
                            onEsc:function(){},
                            closeAction:"destroy",
                            items:[e],
                            buttons:[{
                                text:"reorder",
                                id:"reorder_rows",
                                ref:"../reorderButton",
                                disabled:true,
                                handler:function(){
                                    e.reorderColumns(f.table)
                                }
                            },{
                                text:"cancel",
                                handler:function(){
                                    e.cancelConfirm()
                                }
                            }]
                        });
                        this.win.show()
                    })
                }
            }
        }
    },
    viewTableData:function(b,a){
        return{
            itemId:"view_tabledata_"+b,
            text:"View Data...",
            iconCls:"view_table_data",
            listeners:{
                click:function(d,c){
                    Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
                    Dbl.UserActivity.setKey("activeTableTab","table_data");
                    Dblite.dataPanel.refresh(true)
                }
            }
        }
    },
    viewAdvancedProperties:function(b,a){
        return{
            itemId:"view_advanced_properties_"+b,
            text:"View Advanced Properties...",
            iconCls:"view_table_properties",
            listeners:{
                click:function(d,c){
                    Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
                    Dbl.UserActivity.setKey("activeTableTab","table_information");
                    Dblite.dataPanel.refresh(true)
                }
            }
        }
    },
    manageColumns:function(b,a){
        return{
            itemId:"manage_column_"+b,
            text:"Manage Columns...",
            iconCls:"alter_table",
            listeners:{
                click:function(d,c){
                    if((Dbl.UserActivity.getValue("datapanelActiveTab")=="tablestructure")&&(Dbl.UserActivity.getValue("activeTableTab")=="column_info")){
                        Ext.getCmp("alter_table_panel").closeAlterSQLPreview();
                        Ext.getCmp("alter_table_grid").selectTableColumn()
                    }else{
                        Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
                        Dbl.UserActivity.setKey("activeTableTab","column_info");
                        Dblite.dataPanel.refresh(true)
                    }
                }
            }
        }
    },
    dropColumn:function(b,a){
        return{
            itemId:"drop_column_"+b,
            text:"Drop Column...",
            iconCls:"drop_column",
            listeners:{
                click:function(d,c){
                    if((Dbl.UserActivity.getValue("datapanelActiveTab")=="tablestructure")&&(Dbl.UserActivity.getValue("activeTableTab")=="column_info")){
                        Ext.getCmp("alter_table_grid").dropTableColumn(Explorer.selectedColumn)
                    }else{
                        Dbl.UserActivity.setKey("datapanelActiveTab","tablestructure");
                        Dbl.UserActivity.setKey("activeTableTab","column_info");
                        Dblite.dataPanel.refresh(true);
                        if(Ext.getCmp("alter_table_grid")){
                            Ext.getCmp("alter_table_grid").dropTableColumn()
                        }
                    }
                }
            }
        }
    },
    dropView:function(b,a){
        return{
            itemId:"drop_view_"+b,
            text:"Drop View...",
            iconCls:"drop_view",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("drop_view",[a]),function(e){
                        if(e=="yes"){
                            Database.sendCommand("drop_view",{
                                dbname:Dbl.UserActivity.getValue("database"),
                                view:a
                            },function(g){
                                Explorer.selectedView="";
                                Explorer.selectedViewNodeId="";
                                var f=Explorer.explorerTreePanelObj.getNodeById(b);
                                f.remove()
                            })
                        }
                    })
                }
            }
        }
    },
    dropProcedure:function(b,a){
        return{
            itemId:"drop_procedure_"+b,
            text:"Drop Stored Procedure...",
            iconCls:"drop_procedure",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("drop_procedure",[a]),function(e){
                        if(e=="yes"){
                            Database.sendCommand("drop_procedure",{
                                dbname:Dbl.UserActivity.getValue("database"),
                                procedurename:a
                            },function(g){
                                Explorer.selectedProcedure="";
                                Explorer.selectedProcedureNodeId="";
                                var f=Explorer.explorerTreePanelObj.getNodeById(b);
                                f.remove()
                            })
                        }
                    })
                }
            }
        }
    },
    dropFunction:function(b,a){
        return{
            itemId:"drop_function_"+b,
            text:"Drop Function...",
            iconCls:"drop_function",
            listeners:{
                click:function(d,c){
                    Ext.Msg.confirm("Confirmation",Messages.getMsg("drop_function",[a]),function(e){
                        if(e=="yes"){
                            Database.sendCommand("drop_function",{
                                dbname:Dbl.UserActivity.getValue("database"),
                                functionname:a
                            },function(g){
                                Explorer.selectedFunction="";
                                Explorer.selectedFunctionNodeId="";
                                var f=Explorer.explorerTreePanelObj.getNodeById(b);
                                f.remove()
                            })
                        }
                    })
                }
            }
        }
    },
    showCreateDBWindow:function(){
        Database.sendCommand("get_charset_collation",{},function(a){
            this.win=new Dbl.ContextMenuWindow({
                title:"Create Database",
                id:"create_db_window",
                width:350,
                height:200,
                items:[new Dbl.CreateDbPanel(a.charsets,a.collations)]
            });
            this.win.show()
        })
    }
};

Dbl.ExportTableDbPanel=function(c){
    var a=new Ext.data.ArrayStore({
        fields:["value"],
        data:(c.data)?c.data:c.result,
    });
    var b=(c.sql)?c.sql:"";
    Dbl.ExportTableDbPanel.superclass.constructor.call(this,{
        id:"export_table_panel",
        region:"center",
        xtype:"panel",
        layout:"fit",
        border:false,
        items:[this.createForm(c.curr_db,c.curr_table,a,b)]
    })
};
    
Ext.extend(Dbl.ExportTableDbPanel,Ext.Panel,{
    createForm:function(d,b,a,c){
        return new Ext.FormPanel({
            fileUpload:true,
            frame:true,
            labelAlign:"top",
            name:"export_table_form",
            id:"export_table_form",
            defaults:{
                anchor:"100%",
                allowBlank:false
            },
            items:[{
                layout:"column",
                items:[{
                    columnWidth:0.25,
                    items:this.renderExportTableOptions()
                },{
                    columnWidth:0.75,
                    bodyStyle:"padding-left: 10px;",
                    layout:"form",
                    defaults:{
                        anchor:"100%"
                    },
                    items:[{
                        xtype:"itemselector",
                        name:"table_columns",
                        imagePath:"../app/images/itemselector/",
                        availableLegend:"Available Columns",
                        selectedLegend:"Selected Columns",
                        multiselects:[{
                            width:180,
                            height:135,
                            displayField:"value",
                            valueField:"value",
                            store:new Ext.data.ArrayStore({
                                fields:["value"],
                                data:[]
                            })
                        },{
                            width:180,
                            height:135,
                            store:a,
                            displayField:"value",
                            valueField:"value"
                        }]
                    }]
                }]
            },{
                xtype:"hidden",
                name:"database",
                value:d
            },{
                xtype:"hidden",
                name:"connection_id",
                value:Server.connection_id
            },{
                xtype:"hidden",
                name:"selected_table",
                value:b
            },{
                xtype:"hidden",
                name:"selected_sql",
                value:c
            }],
            buttons:[{
                text:"Export",
                handler:function(){
                    var e=Ext.getCmp("export_table_form").getForm();
                    if(e.getValues().table_columns==""){
                        Dbl.Utils.showErrorMsg(Messages.getMsg("export_table_nocolumn"));
                        return false
                    }
                    e.getEl().dom.action=MAIN_URL+"/cmd.php?command=export.export_table_data&form=1";
                    e.getEl().dom.method="POST";
                    e.getEl().dom.target="download_frame";
                    e.submit()
                }
            },{
                text:"Cancel",
                handler:function(){
                    Ext.getCmp("export_table").close()
                },
                scope:this
            }]
        })
    },
    renderExportTableOptions:function(){
        return[{
            xtype:"fieldset",
            title:"Export As",
            items:[{
                xtype:"radiogroup",
                columns:1,
                defaults:{
                    anchor:"100%"
                },
                items:[{
                    name:"export_table",
                    boxLabel:"HTML",
                    inputValue:"html",
                    style:{
                        marginRight:"4px"
                    },
                    checked:true
                },{
                    name:"export_table",
                    boxLabel:"XML",
                    inputValue:"xml",
                    style:{
                        marginRight:"4px"
                    }
                },{
                    name:"export_table",
                    boxLabel:"CSV",
                    inputValue:"csv",
                    style:{
                        marginRight:"4px"
                    }
                }]
            }]
        }]
    }
});
var HistoryPanel=function(c){
    c=this.attachRenderer(c);
    this.models=c.columns;
    var a=new Ext.data.SimpleStore({
        fields:c.cols
    });
    if(!c.rows){
        c.rows=""
    }
    a.loadData(c.rows);
    var b=new Ext.grid.ColumnModel({
        columns:this.models
    });
    HistoryPanel.superclass.constructor.call(this,{
        id:"history_grid",
        store:a,
        cm:b,
        border:false,
        columns:c.columns,
        columnLines:true,
        autoScroll:true,
        viewConfig:{},
        listeners:{
            celldblclick:this.showContent,
            scope:this
        }
    })
};

Ext.extend(HistoryPanel,Ext.grid.GridPanel,{
    attachRenderer:function(a){
        if(a.rows){
            for(column in a.columns){
                if(a.columns[column].id=="run_query"){
                    a.columns[column].renderer=this.renderIcon
                }
                if(a.columns[column].id=="query"){
                    a.columns[column].renderer=this.renderCodeMirror.createDelegate(this)
                }
                if(a.columns[column].id=="status"){
                    a.columns[column].renderer=this.renderSatusTooltip
                }
            }
        }
        return a
    },
    renderSatusTooltip:function(b,a){
        a.attr='ext:qtip="'+b+'"';
        return b
    },
    renderIcon:function(b,a){
        return'<a href="javascript:void(0);" onclick="Dbl.Utils.executeRow();"><div class="execute_row_sql">exe</div></a>'
    },
    renderCodeMirror:function(c,a){
        var b=Ext.DomHelper.append(document.body,{
            tag:"div",
            html:"",
            cls:"hidden"
        });
        highlightText(c,b,SqlParser);
        a.attr='ext:qtip="'+this.htmlSpecialCharsEncode(c)+'"';
        return b.innerHTML
    },
    htmlSpecialCharsEncode:function(a){
        a=a.replace(/\&/g,"&amp;");
        a=a.replace(/>/g,"&gt;");
        a=a.replace(/</g,"&lt;");
        a=a.replace(/\"/g,"&quot;");
        a=a.replace(/\'/g,"&#39;");
        return a
    },
    showContent:function(a,k,g,b){
        var f=a.getStore().getAt(k);
        var l=a.getColumnModel().getDataIndex(g);
        var e=f.get(l);
        var h=a.getColumnModel().columns[g];
        if((l!="query")&&(l!="status")){
            return
        }
        var c={
            row:k,
            record:f
        };
    
        var j=[{
            text:"close",
            handler:function(){
                Ext.getCmp("history_query_window").close()
            }
        }];
        var d={
            title:(l=="query")?"Query":"Status",
            id:"history_query_window",
            width:300,
            height:350,
            resizable:true,
            autoScroll:true,
            layout:"fit",
            modal:true,
            plain:true,
            stateful:true,
            items:[new LongTextEditPanel(Ext.util.Format.htmlEncode(e))],
            buttons:j
        };

        this.win=new Ext.Window(d);
        this.win.show();
        return false
    },
});
Dbl.IndexGridPanel=function(a){
    a=this.attachRenderer(a);
    Dbl.IndexGridPanel.superclass.constructor.call(this,{
        fields:a.fields,
        data:a.data,
        models:a.models,
        id:"manage_indexes_grid",
        autoExpandColumn:"fullText",
        viewConfig:{},
        border:false,
        autoScroll:true
    })
};
    
Ext.onReady(function(){
    Ext.extend(Dbl.IndexGridPanel,Dbl.ListViewPanel,{
        attachRenderer:function(b){
            for(var a=0;a<b.models.length;a++){
                switch(b.models[a].id){
                    case"indexName":
                        b.models[a].header="Indexs";
                        b.models[a].width=200;
                        break;
                    case"columns":
                        b.models[a].header="Columns";
                        b.models[a].width=200;
                        break;
                    case"unique":
                        b.models[a].header="Unique";
                        b.models[a].width=70;
                        b.models[a].renderer=function(c){
                            return'<input type="checkbox" '+(c?'checked="checked"':"")+' disabled="disabled" />'
                        };
                        
                        break;
                    case"fullText":
                        b.models[a].header="Full Text";
                        b.models[a].width=70;
                        b.models[a].renderer=function(c){
                            return'<input type="checkbox" '+(c?'checked="checked"':"")+' disabled="disabled" />'
                        };
                        
                        break;
                    default:
                        break
                }
            }
            return b
        }
    })
});
/*
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ux.form.ItemSelector=Ext.extend(Ext.form.Field,{
    hideNavIcons:false,
    imagePath:"",
    iconUp:"up2.gif",
    iconDown:"down2.gif",
    iconLeft:"left2.gif",
    iconRight:"right2.gif",
    iconTop:"top22.gif",
    iconBottom:"bottom22.gif",
    drawUpIcon:true,
    drawDownIcon:true,
    drawLeftIcon:true,
    drawRightIcon:true,
    drawTopIcon:true,
    drawBotIcon:true,
    delimiter:",",
    bodyStyle:null,
    border:false,
    availableLegend:"Available",
    selectedLegend:"Selected",
    defaultAutoCreate:{
        tag:"div"
    },
    multiselects:null,
    initComponent:function(){
        Ext.ux.form.ItemSelector.superclass.initComponent.call(this);
        this.addEvents({
            rowdblclick:true,
            change:true
        })
    },
    onRender:function(d,a){
        Ext.ux.form.ItemSelector.superclass.onRender.call(this,d,a);
        var h=[{
            legend:this.availableLegend,
            draggable:true,
            droppable:true,
            width:100,
            height:100
        },{
            legend:this.selectedLegend,
            droppable:true,
            draggable:true,
            width:100,
            height:100
        }];
        this.fromMultiselect=new Ext.ux.form.MultiSelect(Ext.applyIf(this.multiselects[0],h[0]));
        this.fromMultiselect.on("dblclick",this.onRowDblClick,this);
        this.toMultiselect=new Ext.ux.form.MultiSelect(Ext.applyIf(this.multiselects[1],h[1]));
        this.toMultiselect.on("dblclick",this.onRowDblClick,this);
        var g=new Ext.Panel({
            bodyStyle:this.bodyStyle,
            border:this.border,
            layout:"table",
            layoutConfig:{
                columns:3
            }
        });
        g.add(this.fromMultiselect);
        var c=new Ext.Panel({
            header:false
        });
        g.add(c);
        g.add(this.toMultiselect);
        g.render(this.el);
        c.el.down("."+c.bwrapCls).remove();
        if(this.imagePath!=""&&this.imagePath.charAt(this.imagePath.length-1)!="/"){
            this.imagePath+="/"
        }
        this.iconUp=this.imagePath+(this.iconUp||"up2.gif");
        this.iconDown=this.imagePath+(this.iconDown||"down2.gif");
        this.iconLeft=this.imagePath+(this.iconLeft||"left2.gif");
        this.iconRight=this.imagePath+(this.iconRight||"right2.gif");
        this.iconTop=this.imagePath+(this.iconTop||"top22.gif");
        this.iconBottom=this.imagePath+(this.iconBottom||"bottom22.gif");
        var f=c.getEl();
        this.toTopIcon=f.createChild({
            tag:"img",
            src:this.iconTop,
            style:{
                cursor:"pointer",
                margin:"2px"
            }
        });
        f.createChild({
            tag:"br"
        });
        this.upIcon=f.createChild({
            tag:"img",
            src:this.iconUp,
            style:{
                cursor:"pointer",
                margin:"2px 2px 2px 6px"
            }
        });
        f.createChild({
            tag:"br"
        });
        this.addIcon=f.createChild({
            tag:"img",
            src:this.iconRight,
            style:{
                cursor:"pointer",
                margin:"2px 2px 2px 6px"
            }
        });
        f.createChild({
            tag:"br"
        });
        this.removeIcon=f.createChild({
            tag:"img",
            src:this.iconLeft,
            style:{
                cursor:"pointer",
                margin:"2px 2px 2px 6px"
            }
        });
        f.createChild({
            tag:"br"
        });
        this.downIcon=f.createChild({
            tag:"img",
            src:this.iconDown,
            style:{
                cursor:"pointer",
                margin:"2px 2px 2px 6px"
            }
        });
        f.createChild({
            tag:"br"
        });
        this.toBottomIcon=f.createChild({
            tag:"img",
            src:this.iconBottom,
            style:{
                cursor:"pointer",
                margin:"2px"
            }
        });
        this.toTopIcon.on("click",this.toTop,this);
        this.upIcon.on("click",this.up,this);
        this.downIcon.on("click",this.down,this);
        this.toBottomIcon.on("click",this.toBottom,this);
        this.addIcon.on("click",this.fromTo,this);
        this.removeIcon.on("click",this.toFrom,this);
        if(!this.drawUpIcon||this.hideNavIcons){
            this.upIcon.dom.style.display="none"
        }
        if(!this.drawDownIcon||this.hideNavIcons){
            this.downIcon.dom.style.display="none"
        }
        if(!this.drawLeftIcon||this.hideNavIcons){
            this.addIcon.dom.style.display="none"
        }
        if(!this.drawRightIcon||this.hideNavIcons){
            this.removeIcon.dom.style.display="none"
        }
        if(!this.drawTopIcon||this.hideNavIcons){
            this.toTopIcon.dom.style.display="none"
        }
        if(!this.drawBotIcon||this.hideNavIcons){
            this.toBottomIcon.dom.style.display="none"
        }
        var b=g.body.first();
        this.el.setWidth(g.body.first().getWidth());
        g.body.removeClass();
        this.hiddenName=this.name;
        var e={
            tag:"input",
            type:"hidden",
            value:"",
            name:this.name
        };
    
        this.hiddenField=this.el.createChild(e)
    },
    doLayout:function(){
        if(this.rendered){
            this.fromMultiselect.fs.doLayout();
            this.toMultiselect.fs.doLayout()
        }
    },
    afterRender:function(){
        Ext.ux.form.ItemSelector.superclass.afterRender.call(this);
        this.toStore=this.toMultiselect.store;
        this.toStore.on("add",this.valueChanged,this);
        this.toStore.on("remove",this.valueChanged,this);
        this.toStore.on("load",this.valueChanged,this);
        this.valueChanged(this.toStore)
    },
    toTop:function(){
        var c=this.toMultiselect.view.getSelectedIndexes();
        var a=[];
        if(c.length>0){
            c.sort();
            for(var b=0;b<c.length;b++){
                record=this.toMultiselect.view.store.getAt(c[b]);
                a.push(record)
            }
            c=[];
            for(var b=a.length-1;b>-1;b--){
                record=a[b];
                this.toMultiselect.view.store.remove(record);
                this.toMultiselect.view.store.insert(0,record);
                c.push(((a.length-1)-b))
            }
        }
        this.toMultiselect.view.refresh();
        this.toMultiselect.view.select(c)
    },
    toBottom:function(){
        var c=this.toMultiselect.view.getSelectedIndexes();
        var a=[];
        if(c.length>0){
            c.sort();
            for(var b=0;b<c.length;b++){
                record=this.toMultiselect.view.store.getAt(c[b]);
                a.push(record)
            }
            c=[];
            for(var b=0;b<a.length;b++){
                record=a[b];
                this.toMultiselect.view.store.remove(record);
                this.toMultiselect.view.store.add(record);
                c.push((this.toMultiselect.view.store.getCount())-(a.length-b))
            }
        }
        this.toMultiselect.view.refresh();
        this.toMultiselect.view.select(c)
    },
    up:function(){
        var a=null;
        var c=this.toMultiselect.view.getSelectedIndexes();
        c.sort();
        var d=[];
        if(c.length>0){
            for(var b=0;b<c.length;b++){
                a=this.toMultiselect.view.store.getAt(c[b]);
                if((c[b]-1)>=0){
                    this.toMultiselect.view.store.remove(a);
                    this.toMultiselect.view.store.insert(c[b]-1,a);
                    d.push(c[b]-1)
                }
            }
            this.toMultiselect.view.refresh();
            this.toMultiselect.view.select(d)
        }
    },
    down:function(){
        var a=null;
        var c=this.toMultiselect.view.getSelectedIndexes();
        c.sort();
        c.reverse();
        var d=[];
        if(c.length>0){
            for(var b=0;b<c.length;b++){
                a=this.toMultiselect.view.store.getAt(c[b]);
                if((c[b]+1)<this.toMultiselect.view.store.getCount()){
                    this.toMultiselect.view.store.remove(a);
                    this.toMultiselect.view.store.insert(c[b]+1,a);
                    d.push(c[b]+1)
                }
            }
            this.toMultiselect.view.refresh();
            this.toMultiselect.view.select(d)
        }
    },
    fromTo:function(){
        var e=this.fromMultiselect.view.getSelectedIndexes();
        var b=[];
        if(e.length>0){
            for(var d=0;d<e.length;d++){
                record=this.fromMultiselect.view.store.getAt(e[d]);
                b.push(record)
            }
            if(!this.allowDup){
                e=[]
            }
            for(var d=0;d<b.length;d++){
                record=b[d];
                if(this.allowDup){
                    var a=new Ext.data.Record();
                    record.id=a.id;
                    delete a;
                    this.toMultiselect.view.store.add(record)
                }else{
                    this.fromMultiselect.view.store.remove(record);
                    this.toMultiselect.view.store.add(record);
                    e.push((this.toMultiselect.view.store.getCount()-1))
                }
            }
        }
        this.toMultiselect.view.refresh();
        this.fromMultiselect.view.refresh();
        var c=this.toMultiselect.store.sortInfo;
        if(c){
            this.toMultiselect.store.sort(c.field,c.direction)
        }
        this.toMultiselect.view.select(e)
    },
    toFrom:function(){
        var d=this.toMultiselect.view.getSelectedIndexes();
        var a=[];
        if(d.length>0){
            for(var c=0;c<d.length;c++){
                record=this.toMultiselect.view.store.getAt(d[c]);
                a.push(record)
            }
            d=[];
            for(var c=0;c<a.length;c++){
                record=a[c];
                this.toMultiselect.view.store.remove(record);
                if(!this.allowDup){
                    this.fromMultiselect.view.store.add(record);
                    d.push((this.fromMultiselect.view.store.getCount()-1))
                }
            }
        }
        this.fromMultiselect.view.refresh();
        this.toMultiselect.view.refresh();
        var b=this.fromMultiselect.store.sortInfo;
        if(b){
            this.fromMultiselect.store.sort(b.field,b.direction)
        }
        this.fromMultiselect.view.select(d)
    },
    valueChanged:function(c){
        var a=null;
        var b=[];
        for(var d=0;d<c.getCount();d++){
            a=c.getAt(d);
            b.push(a.get(this.toMultiselect.valueField))
        }
        this.hiddenField.dom.value=b.join(this.delimiter);
        this.fireEvent("change",this,this.getValue(),this.hiddenField.dom.value)
    },
    getValue:function(){
        return this.hiddenField.dom.value
    },
    onRowDblClick:function(c,a,b,d){
        if(c==this.toMultiselect.view){
            this.toFrom()
        }else{
            if(c==this.fromMultiselect.view){
                this.fromTo()
            }
        }
        return this.fireEvent("rowdblclick",c,a,b,d)
    },
    reset:function(){
        range=this.toMultiselect.store.getRange();
        this.toMultiselect.store.removeAll();
        this.fromMultiselect.store.add(range);
        var a=this.fromMultiselect.store.sortInfo;
        if(a){
            this.fromMultiselect.store.sort(a.field,a.direction)
        }
        this.valueChanged(this.toMultiselect.store)
    }
});
Ext.reg("itemselector",Ext.ux.form.ItemSelector);
Ext.ux.ItemSelector=Ext.ux.form.ItemSelector;
Ext.onReady(function(){
    var a=new Ext.KeyMap(document,[{
        key:Ext.EventObject.F1,
        handler:Topmenu.showDbliteHelpWindow,
        stopEvent:true,
    },{
        key:Ext.EventObject.F3,
        handler:Topmenu.showKeyMappingsWindow,
        stopEvent:true,
    },{
        key:Ext.EventObject.F5,
        handler:Explorer.refreshDatabaseExplorer,
        stopEvent:true,
    },{
        key:Ext.EventObject.F6,
        handler:Explorer.alterTableStructure,
        stopEvent:true,
    },{
        key:Ext.EventObject.F7,
        handler:Explorer.alterTableIndexes,
        stopEvent:true,
    },{
        key:"1",
        ctrl:true,
        handler:Explorer.showHideDatabaseExplorer,
        stopEvent:true,
    },{
        key:"2",
        ctrl:true,
        handler:Dblite.showHideDataPanel,
        stopEvent:true,
    },{
        key:"3",
        ctrl:true,
        handler:Dblite.showHideEditorPanel,
        stopEvent:true,
    },{
        key:"D",
        ctrl:true,
        handler:Explorer.showCreateDBPanel,
        stopEvent:true,
    },{
        key:"S",
        ctrl:true,
        handler:Editor.saveSQLEditor,
        stopEvent:true,
        scope:Editor
    }])
});
Dbl.ListViewPanel=function(c){
    var b=new Ext.data.SimpleStore({
        fields:c.fields
    });
    b.loadData(c.data);
    if(!c.data.length){
        return{
            border:false,
            padding:"10",
            html:Messages.getMsg("no_records")
        }
    }
    var a=new Ext.grid.ColumnModel({
        columns:c.models
    });
    delete c.data;
    delete c.models;
    delete c.fields;
    var d=Ext.applyIf(c,{
        store:b,
        cm:a,
        columnLines:false,
        viewConfig:{},
        listeners:{
            viewready:function(){
                this.autoSizeColumns()
            },
            scope:this
        }
    });
    Dbl.ListViewPanel.superclass.constructor.call(this,d)
};

Ext.extend(Dbl.ListViewPanel,Ext.grid.GridPanel,{
    autoSizeColumns:function(){
        for(var a=0;a<this.colModel.getColumnCount();a++){
            this.autoSizeColumn(a)
        }
        this.view.refresh(true)
    },
    autoSizeColumn:function(f,a){
        var d=this.view.getHeaderCell(f).firstChild.scrollWidth;
        for(var e=0;e<this.store.getCount();e++){
            var b=this.view.getCell(e,f).firstChild.scrollWidth;
            d=Math.max(d,b);
            if(a&&d>a){
                d=a
            }
        }
        if(!d){
            return
        }
        this.colModel.setColumnWidth(f,d+2);
        return d
    }
});
var LongTextEditPanel=function(b){
    var b=Ext.util.Format.htmlDecode(b);
    var a=[{
        xtype:"checkbox",
        boxLabel:"Set NULL",
        name:"set_as_null",
        checked:(b=="(NULL)")?true:false,
        listeners:{
            check:function(e,d){
                Ext.getCmp("long_text").disable();
                if(!d){
                    Ext.getCmp("long_text").enable()
                }
            }
        },
        hidden:(Dbl.UserActivity.getValue("table_type")=="table")?false:true
    },{
        xtype:"textarea",
        id:"long_text",
        width:260,
        height:250,
        disabled:(b=="(NULL)")?true:false,
        name:"long_text",
        value:b
    }];
    LongTextEditPanel.superclass.constructor.call(this,{
        id:"long_text_edit_form",
        frame:true,
        layout:"form",
        items:a,
        labelWidth:0.1,
        border:false
    })
};

Ext.extend(LongTextEditPanel,Ext.form.FormPanel,{});
ManageIndexes={
    GridPanel:function(a){
        a.autoExpandColumn="columns";
        a.viewConfig={
            forceFit:true
        };
        
        ManageIndexes.GridPanel.superclass.constructor.call(this,a)
    },
    gridPanelStore:function(b){
        var a=new Ext.data.SimpleStore({
            fields:b.fields
        });
        a.loadData(b.data);
        return a
    },
    gridPanelColumnModel:function(c){
        for(var b=0;b<c.models.length;b++){
            var d=c.models[b];
            if(d.id=="unique"||d.id=="fullText"){
                d.renderer=function(e){
                    return'<input type="checkbox" '+(e?'checked="checked"':"")+' disabled="disabled" />'
                }
            }
        }
        var a=new Ext.grid.ColumnModel({
            columns:c.models
        });
        return a
    },
    closeManageIndexesWindow:function(){
        Ext.getCmp("manage_indexes_window").close()
    },
    showDeleteIndexConfirmation:function(){
        var h=Ext.getCmp("manage_indexes_grid");
        var b=h.getSelectionModel();
        var e=b.getSelections();
        if(!e.length){
            var g="Please select index(s) to delete!";
            Dbl.Utils.showErrorMsg(g,"");
            return
        }
        ManageIndexes.indexesForDeletion=[];
        for(var c=0;c<e.length;c++){
            ManageIndexes.indexesForDeletion.push(e[c].data.indexName)
        }
        var f="Are you sure?";
        var d="Are you sure you want to delete the selected index(es)?";
        var a=function(j){
            if(j=="yes"){
                Server.sendCommand("delete_indexes",{
                    indexes:ManageIndexes.indexesForDeletion,
                    table:Explorer.selectedDbTable
                },function(k){
                    Dbl.Utils.showInfoMsg(Messages.getMsg("index_deletion_success"));
                    ManageIndexes.refreshGrid()
                })
            }
        };
    
        Ext.MessageBox.confirm(f,d,a)
    },
    indexesForDeletion:[],
    refreshGrid:function(){
        Server.sendCommand("get_min_table_indexes",{
            parent_database:Explorer.selectedDatabase,
            table:Explorer.selectedDbTable
        },function(c){
            var b=ManageIndexes.gridPanelStore(c);
            var a=ManageIndexes.gridPanelColumnModel(c);
            Ext.getCmp("manage_indexes_grid").reconfigure(b,a)
        })
    },
    showEditIndexWindow:function(){
        var a=Ext.getCmp("manage_indexes_grid").getSelectionModel().getCount();
        if(!a){
            Dbl.Utils.showErrorMsg(Messages.getMsg("edit_index_required"))
        }else{
            if(a>1){
                Dbl.Utils.showErrorMsg(Messages.getMsg("edit_index_single"))
            }else{
                Server.sendCommand("get_min_table_columns",{
                    table:Explorer.selectedDbTable
                },function(b){
                    b.editMode=true;
                    ManageIndexes.addIndexWin=new ManageIndexes.AddIndexWindow(b);
                    ManageIndexes.addIndexWin.show()
                })
            }
        }
    },
    showAddIndexWindow:function(a){
        Server.sendCommand("get_min_table_columns",{
            table:Explorer.selectedDbTable
        },function(b){
            ManageIndexes.addIndexWin=new ManageIndexes.AddIndexWindow(b);
            ManageIndexes.addIndexWin.show()
        })
    },
    AddIndexWindow:function(e){
        var h=new ManageIndexes.AddIndexGrid(e);
        var a=new ManageIndexes.AddIndexForm();
        if(e.editMode){
            var k=Ext.getCmp("manage_indexes_grid").getSelectionModel().getSelected().data;
            var l=k.indexName;
            var f=a.getForm();
            f.findField("add_index_form_index_name").setValue(l);
            f.findField("add_index_form_original_name").setValue(l);
            var g;
            if(l=="PRIMARY"){
                g="primary"
            }else{
                if(k.unique==true){
                    g="unique"
                }else{
                    if(k.fullText==true){
                        g="fullText"
                    }else{
                        g="none"
                    }
                }
            }
            var j="add_index_form_index_type_"+g;
            Ext.getCmp("options_group").setValue(j,true);
            var b=k.columns.split(",").reverse();
            for(var d=0;d<b.length;d++){
                var m=h.getStore().find("Name",b[d]);
                var c=h.getStore().getAt(m);
                c.set("included",true);
                h.getStore().remove(c);
                h.getStore().insert(0,c)
            }
        }
        ManageIndexes.AddIndexWindow.superclass.constructor.call(this,{
            title:"Add New Index",
            id:"add_index_window",
            headerAsText:true,
            width:350,
            resizable:false,
            modal:true,
            plain:true,
            stateful:true,
            shadow:false,
            onEsc:function(){},
            closeAction:"destroy",
            items:[a,h],
            buttons:[{
                text:e.editMode?"submit":"add",
                handler:e.editMode?ManageIndexes.editIndex:ManageIndexes.createAndAddIndex
            },{
                text:"cancel",
                handler:ManageIndexes.closeAddIndexWindow
            }]
        })
    },
    AddIndexGrid:function(c){
        var b=new Ext.ux.CheckColumn({
            header:" ",
            checkOnly:true,
            dataIndex:"included",
            width:20
        });
        for(var a=0;a<c.fields.length;a++){
            if(c.fields[a]=="included"){
                c.fields[a].type="bool";
                c.models[a]=b
            }
        }
        ManageIndexes.AddIndexGrid.superclass.constructor.call(this,{
            fields:c.fields,
            data:c.data,
            models:c.models,
            autoExpandColumn:"Name",
            viewConfig:{
                forceFit:true
            },
            id:"add_index_grid",
            height:180,
            autoScroll:true,
            fbar:[Messages.getMsg("edit_index_footer")],
            enableDragDrop:true,
            ddGroup:"mygridDD",
            plugins:[b],
            listeners:{
                render:{
                    scope:this,
                    fn:function(e){
                        var d=new Ext.dd.DropTarget(e.container,{
                            ddGroup:"mygridDD",
                            copy:false,
                            notifyDrop:function(f,l,k){
                                var j=e.store;
                                var m=e.getSelectionModel();
                                var h=m.getSelections();
                                if(f.getDragData(l)){
                                    var g=f.getDragData(l).rowIndex;
                                    if(typeof(g)!="undefined"){
                                        for(a=0;a<h.length;a++){
                                            j.remove(j.getById(h[a].id))
                                        }
                                        j.insert(g,k.selections);
                                        m.clearSelections()
                                    }
                                }
                            }
                        })
                    }
                }
            }
        })
    },
    AddIndexForm:function(a){
        var b=[{
            boxLabel:"Unique",
            name:"add_index_form_index_type",
            id:"add_index_form_index_type_unique",
            inputValue:"unique"
        },{
            boxLabel:"Full Text",
            name:"add_index_form_index_type",
            id:"add_index_form_index_type_fullText",
            inputValue:"fullText"
        },{
            boxLabel:"Primary",
            name:"add_index_form_index_type",
            id:"add_index_form_index_type_primary",
            inputValue:"primary",
            listeners:{
                check:{
                    fn:function(){
                        var c=Ext.getCmp("add_index_form").getForm().getValues(false);
                        var d=Ext.getCmp("add_index_form_index_name");
                        if(c.add_index_form_index_type=="primary"){
                            d.prevValue=c.add_index_form_index_name;
                            d.setValue("PRIMARY");
                            d.disable()
                        }else{
                            d.setValue(d.prevValue);
                            d.enable()
                        }
                    }
                }
            }
        },{
            boxLabel:"None",
            name:"add_index_form_index_type",
            id:"add_index_form_index_type_none",
            inputValue:"none",
            checked:true
        }];
        ManageIndexes.AddIndexForm.superclass.constructor.call(this,{
            id:"add_index_form",
            labelAlign:"top",
            frame:true,
            bodyStyle:"padding: 5px",
            defaults:{
                anchor:"100%"
            },
            items:[{
                xtype:"textfield",
                fieldLabel:"Index Name",
                name:"add_index_form_index_name",
                id:"add_index_form_index_name",
                blankText:"Index name is required",
                allowBlank:false
            },{
                xtype:"hidden",
                name:"add_index_form_original_name",
                id:"add_index_form_original_name"
            },{
                xtype:"radiogroup",
                rows:1,
                id:"options_group",
                defaults:{
                    anchor:"100%"
                },
                bodyStyle:"padding: 0px; margin: 0px",
                items:b,
                fieldLabel:"Index Options"
            }]
        })
    },
    editIndex:function(){
        ManageIndexes.createAndAddIndex(true)
    },
    createAndAddIndex:function(g){
        var f=Ext.getCmp("add_index_form").getForm();
        if(!f.isValid()){
            return
        }
        var c=f.getValues();
        var b=Ext.getCmp("add_index_grid").getStore();
        var d=[];
        var h=0;
        for(var e=0;e<b.getCount();e++){
            var a=b.getAt(e);
            if(a.get("included")==true){
                d.push(a.get("Name"));
                h++
            }
        }
        if(h<1){
            Dbl.Utils.showErrorMsg(Messages.getMsg("add_index_column_req"));
            return
        }
        Server.sendCommand("create_indexes",{
            table:Explorer.selectedDbTable,
            type:c.add_index_form_index_type,
            name:c.add_index_form_index_name,
            indexes:d,
            originalName:c.add_index_form_original_name
        },function(j){
            if(j.success){
                ManageIndexes.refreshGrid();
                ManageIndexes.closeAddIndexWindow();
                Dbl.Utils.showInfoMsg(Messages.getMsg("index_addition_success"))
            }else{
                if(!j.success){
                    var k=j.msg?j.msg:j;
                    Dbl.Utils.showErrorMsg(j.msg,"")
                }
            }
        },function(j){
            Dbl.Utils.showErrorMsg(j.msg,"")
        })
    },
    closeAddIndexWindow:function(){
        Ext.getCmp("add_index_window").close()
    }
};

Ext.onReady(function(){
    Ext.extend(ManageIndexes.GridPanel,Dbl.ListViewPanel,{
        hello:function(a){}
    });
    Ext.extend(ManageIndexes.AddIndexWindow,Ext.Window,{});
    Ext.extend(ManageIndexes.AddIndexGrid,Dbl.ListViewPanel,{});
    Ext.extend(ManageIndexes.AddIndexForm,Ext.FormPanel,{})
});
Dbl.ManageIndexGridPanel=function(d){
    d=this.createColumns(d);
    var b=new Ext.data.SimpleStore({
        fields:d.fields
    });
    b.on("load",function(h,f,k){
        Dbl.Utils.removeLoadingIcon();
        for(var g=0;g<f.length;g++){
            var j=f[g];
            j.originalcopy=j.copy()
        }
    });
    b.loadData(d.data);
    var a=new Ext.grid.CheckboxSelectionModel({
        header:"",
        checkOnly:true,
        init:function(f){
            this.grid=f;
            this.initEvents()
        }
    });
    var e=new Array(a);
    var e=e.concat(d.models);
    var c=new Ext.grid.ColumnModel({
        defaults:{},
        columns:e
    });
    Dbl.ManageIndexGridPanel.superclass.constructor.call(this,{
        id:"manage_index_grid",
        store:b,
        height:432,
        cm:c,
        sm:a,
        columnLines:true,
        clicksToEdit:1,
        viewConfig:{},
        border:false,
        listeners:{
            viewready:this.autoSizeColumns,
            cellclick:this.handleCellClick,
            beforeedit:this.handleBeforeEdit,
            afteredit:this.handleAfterEdit,
            scope:this
        }
    })
};

Ext.extend(Dbl.ManageIndexGridPanel,Ext.grid.EditorGridPanel,{
    droppedIndexes:new Array(),
    reset:function(){
        this.droppedIndexes=new Array()
    },
    autoSizeColumns:function(){
        for(var a=0;a<this.colModel.getColumnCount();a++){
            this.autoSizeColumn(a)
        }
        this.view.refresh(true)
    },
    autoSizeColumn:function(e){
        var b=this.view.getHeaderCell(e).firstChild.scrollWidth;
        for(var d=0;d<this.store.getCount();d++){
            var a=this.view.getCell(d,e).firstChild.scrollWidth;
            b=Math.max(b,a)
        }
        if(!b){
            return
        }
        this.colModel.setColumnWidth(e,b+2);
        return b
    },
    createColumns:function(c){
        for(var b=0;b<c.fields.length;b++){
            var a=c.fields[b];
            switch(a){
                case"index":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
                
                    c.models[b].width=(c.models[b].width<135)?135:c.models[b].width;
                    c.models[b].header="Indexes";
                    c.models[b].editor=new Ext.form.TextField({
                        name:a
                    });
                    break;
                case"columns":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
                
                    c.models[b].width=(c.models[b].width<158)?158:c.models[b].width;
                    c.models[b].header="Columns";
                    c.models[b].editor=new Ext.form.TextField({
                        name:a
                    });
                    break;
                case"option":
                    c.fields[b]={
                        name:a,
                        type:"string"
                    };
                
                    c.models[b].header="Option";
                    c.models[b].width=100;
                    c.models[b].editor=Dbl.Utils.getComboBoxEditor(a,c.index_options);
                    break;
                case"add_column":
                    c.fields[b]={
                        name:a,
                        id:"add_column_header"
                    };
                
                    c.models[b]={
                        header:"Edit",
                        id:a,
                        dataIndex:a,
                        width:30,
                        renderer:this.renderIcon
                    };
                    
                    c.models[b].editor="";
                default:
                    break
            }
        }
        return c
    },
    renderIcon:function(b,a){
        a.attr='ext:qtip=" Edit Column(s)"';
        return'<a href="javascript:void(0);"><div class="index_add_cols">add</div></a>'
    },
    handleCellClick:function(a,d,b,c){
        if(b==3){
            a.showAddColumnsWindow(d,c.xy)
        }else{
            a.startEditing(d,b)
        }
    },
    handleBeforeEdit:function(a){
        if(a.record.originalcopy&&a.field=="index"&&a.value.toLowerCase()=="primary"){
            return false
        }
    },
    handleAfterEdit:function(b){
        this.autoSizeColumns();
        if(b.value==b.originalValue){
            return
        }else{
            var a=Ext.getCmp("manage_index_panel").getTopToolbar();
            a.get(0).enable()
        }
    },
    addIndex:function(){
        var d=this.store;
        var b=this.getSelectionModel().getSelections();
        var h="";
        if(b.length>0){
            var g=b[0];
            var e=d.indexOf(g);
            if(e!=-1){
                h=e
            }
        }
        var c=d.getCount();
        var a=new d.recordType({});
        a.newfield=true;
        var f=(b.length>0)?h:c;
        this.stopEditing();
        d.insert(f,a);
        this.startEditing(f,1)
    },
    removeIndexConfirm:function(){
        var b=this;
        var a=b.getSelectionModel().getSelections();
        if(a.length>0){
            Ext.Msg.show({
                title:"Confirmation",
                msg:Messages.getMsg("delete_index_confirm"),
                buttons:Ext.Msg.YESNO,
                fn:this.removeIndex,
                animEl:document.body,
                icon:Ext.MessageBox.QUESTION,
                scope:b
            })
        }else{
            Dbl.Utils.showErrorMsg(Messages.getMsg("delete_index_required"))
        }
    },
    removeIndex:function(c){
        if(c=="yes"){
            var e=this.getSelectionModel().getSelections();
            for(var b=0;b<e.length;b++){
                var f=e[b];
                if(f.originalcopy&&!f.newfield){
                    var a=f.originalcopy.data.index;
                    this.droppedIndexes.push(a)
                }
                this.store.remove(f);
                var d=Ext.getCmp("manage_index_panel").getTopToolbar();
                d.get(0).enable()
            }
        }else{
            this.getSelectionModel().clearSelections()
        }
    },
    getIndexSQL:function(){
        var a=this.primary_keys;
        var b=new Array();
        var c=new Array();
        var h=new Array();
        var k="";
        var j="Alter table `"+Dbl.UserActivity.getValue("database")+"`.`"+Dbl.UserActivity.getValue("table")+"`";
        this.store.each(function(q){
            var o=q.data;
            if(q.newfield&&o.index&&(o.index!="undefined")){
                var n=Ext.util.Format.trim(o.index);
                if(n&&n.toLowerCase()=="primary"){
                    b=b.concat(a);
                    if(o.columns){
                        b=b.concat(o.columns.split(","))
                    }else{
                        b.push(" ")
                    }
                }else{
                    var m=Ext.getCmp("manage_index_grid").getAddIndexDefinition(o);
                    c.push(m)
                }
            }else{
                if(q.originalcopy){
                    if(o.index.toLowerCase()=="primary"){
                        if(((Ext.util.Format.trim(o.columns))!=q.originalcopy.data.columns)||((Ext.util.Format.trim(o.option))!=q.originalcopy.data.option)){
                            b=b.concat(o.columns.split(","))
                        }
                    }else{
                        if(((Ext.util.Format.trim(o.index))!=q.originalcopy.data.index)||((Ext.util.Format.trim(o.columns))!=q.originalcopy.data.columns)||((Ext.util.Format.trim(o.option))!=q.originalcopy.data.option)){
                            var p=Ext.getCmp("manage_index_grid").getDropIndexDefinition(q.originalcopy.data.index,false);
                            h.push(p);
                            var m=Ext.getCmp("manage_index_grid").getAddIndexDefinition(o);
                            c.push(m)
                        }
                    }
                }
            }
        });
        if(b.length){
            var e=Ext.getCmp("manage_index_grid").getDropIndexDefinition("",true);
            h.push(e);
            k=Ext.getCmp("manage_index_grid").getPrimaryKeyDefinition(b)
        }
        if(b.length||c.length||h.length||this.droppedIndexes.length){
            if(this.droppedIndexes.length){
                for(var d=0;d<this.droppedIndexes.length;d++){
                    var g=false;
                    var f=this.droppedIndexes[d].toLowerCase();
                    if(f=="primary"){
                        g=true
                    }
                    var e=Ext.getCmp("manage_index_grid").getDropIndexDefinition(this.droppedIndexes[d],g);
                    h.push(e)
                }
            }
            j+="\n";
            if(h.length){
                j+=h.join(",\n")
            }
            if(k){
                var l=(h.length)?",\n":"";
                j+=l+k
            }
            if(c.length){
                var l=(h.length||k)?",\n":"";
                j+=l+c.join(",\n")
            }
            return j+";"
        }else{
            return j+";"
        }
    },
    getAddIndexDefinition:function(d){
        var c=new Array();
        var a="";
        if(d.columns){
            c=c.concat(d.columns.split(","))
        }else{
            c.push(" ")
        }
        if(c.length){
            for(var b=0;b<c.length;b++){
                c[b]="`"+Ext.util.Format.trim(c[b])+"`"
            }
        }
        if(d.option&&d.option.toLowerCase()=="unique"){
            a+="add UNIQUE `"+d.index+"` ("+c.join(", ")+")"
        }else{
            if(d.option&&d.option.toLowerCase()=="fulltext"){
                a+="add FULLTEXT `"+d.index+"` ("+c.join(", ")+")"
            }else{
                a+="add INDEX `"+d.index+"` ("+c.join(", ")+")"
            }
        }
        return a
    },
    getDropIndexDefinition:function(a,b){
        if(b){
            return"drop PRIMARY key"
        }else{
            return"drop key `"+a+"`"
        }
    },
    getPrimaryKeyDefinition:function(a){
        var d=new Array();
        for(var c=0;c<a.length;c++){
            var b="`"+a[c]+"`";
            if(d.indexOf(b)==-1){
                d.push(b)
            }
        }
        return"add PRIMARY key ("+d.join(", ")+")"
    },
    validateDefinitionAndAlter:function(){
        Dbl.Utils.showWaitMask();
        var a=this.validateDefinition();
        if(a){
            this.alterTable()
        }else{
            Dbl.Utils.hideWaitMask()
        }
    },
    validateDefinition:function(){
        var a=this.getStore();
        var d=a.data.items;
        var j=Messages.getMsg("noindex_definitions");
        var h=false;
        for(var e=0;e<d.length;e++){
            var b=d[e].data;
            var f=Ext.util.Format.trim(b.index);
            var c=Ext.util.Format.trim(b.columns);
            if(!f||f=="undefined"){
                continue
            }
            if(f&&c&&(c!="undefined")){
                h=true
            }else{
                if(f&&(!c||c=="undefined")){
                    var g=Messages.getMsg("nocolumns_index",[f]);
                    Dbl.Utils.showErrorMsg(g,"");
                    return false
                }else{
                    if(!f&&c){
                        var j=Messages.getMsg("noindex_columns",[c]);
                        Dbl.Utils.showErrorMsg(j,"");
                        return false
                    }else{
                        if(!f&&!c&&(e==d.length-1)&&!h){
                            Dbl.Utils.showErrorMsg(j,"");
                            return false
                        }
                    }
                }
            }
        }
        return true
    },
    alterTable:function(){
        var a=this.getIndexSQL();
        Server.sendCommand("alter_table_indexes",{
            parent_database:Dbl.UserActivity.getValue("database"),
            target_table:Dbl.UserActivity.getValue("table"),
            alter_sql:a
        },function(b){
            if(b.success){
                Ext.getCmp("manage_index_grid").reset();
                Dbl.Utils.hideWaitMask();
                if(b.msg){
                    Ext.Msg.show({
                        title:"Success",
                        msg:b.msg,
                        buttons:Ext.Msg.OK,
                        fn:Ext.getCmp("manage_index_panel").refreshStore,
                        animEl:document.body,
                        icon:Ext.MessageBox.INFO
                    })
                }else{
                    Ext.getCmp("manage_index_panel").refreshStore()
                }
            }else{
                if(!b.success){
                    Dbl.Utils.hideWaitMask();
                    Dbl.Utils.showErrorMsg(b.msg,"")
                }
            }
        },function(c){
            Dbl.Utils.hideWaitMask();
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"")
        })
    },
    showAddColumnsWindow:function(c,a){
        var b=new Dbl.EditIndexFormPanel(c);
        this.win=new Dbl.ContextMenuWindow({
            title:"Edit Column(s)",
            id:"edit_index_window",
            width:508,
            height:240,
            onEsc:function(){},
            x:a[0]-485,
            y:a[1]+12,
            layout:"fit",
            plain:true,
            closable:true,
            buttonAlign:"right",
            items:[b],
            header:false,
            resizable:true,
            buttons:[{
                text:"Add",
                handler:b.getSelectedColumns.createDelegate(b,[c])
            },{
                text:"Cancel",
                handler:b.cancelEdit,
                scope:b
            }]
        });
        this.win.show()
    },
    changeCellData:function(c,f){
        var b=Ext.getCmp("manage_index_grid");
        var a=b.getStore().getAt(f);
        var e=b.getColumnModel().getDataIndex(2);
        a.set(e,c);
        Ext.getCmp("edit_index_window").close();
        var d=Ext.getCmp("manage_index_panel").getTopToolbar();
        d.get(0).enable();
        this.autoSizeColumns()
    }
});
Dbl.ManageIndexPanel=function(c){
    var b=new Dbl.ManageIndexGridPanel(c);
    b.reset();
    b.primary_keys=c.primary_keys;
    b.table_columns=c.table_columns;
    var a=new Ext.Panel({
        id:"index_sql_panel",
        autoScroll:true,
        border:false,
        items:[],
        listeners:{
            beforeshow:this.activateTab.createCallback(b),
            scope:this
        }
    });
    Dbl.ManageIndexPanel.superclass.constructor.call(this,{
        id:"manage_index_panel",
        layout:"fit",
        split:true,
        border:false,
        header:false,
        tbar:this.buildTopToolbar(b),
        items:[b,a]
    })
};

Ext.extend(Dbl.ManageIndexPanel,Ext.Panel,{
    activateTab:function(c,b,a){
        c.stopEditing(false);
        var f=c.getIndexSQL();
        var d={
            id:"index_sql_codemirror",
            xtype:"uxCodeMirrorPanel",
            parser:"sql",
            padding:"2",
            border:false,
            autoScroll:true,
            sourceCode:f,
            codeMirror:{
                height:"100%",
                width:"100%",
                lineNumbers:false,
                readOnly:true
            }
        };
        
        var e=Ext.getCmp("manage_index_panel").get("index_sql_panel");
        e.removeAll();
        e.add(d);
        e.doLayout()
    },
    buildTopToolbar:function(a){
        return[{
            xtype:"buttongroup",
            disabled:true,
            items:[{
                text:"Apply",
                tooltip:"Edit table indexes",
                iconCls:"alter_table_index",
                width:60,
                handler:a.validateDefinitionAndAlter,
                scope:a
            },{
                text:"Cancel",
                tooltip:"Cancel changes",
                iconCls:"cancel_table_create",
                width:60,
                handler:this.cancelConfirm.createCallback(),
                scope:this
            }]
        },"-",{
            xtype:"buttongroup",
            items:[{
                text:"Add",
                tooltip:"Add new index",
                iconCls:"add_table_index",
                width:60,
                handler:a.addIndex,
                scope:a
            },{
                text:"Drop",
                tooltip:"Drop selected index(s)",
                iconCls:"delete_table_index",
                width:60,
                handler:a.removeIndexConfirm,
                scope:a
            }]
        },"-",{
            xtype:"buttongroup",
            items:[{
                text:"Refresh",
                id:"refresh_table_index",
                tooltip:"Refresh",
                iconCls:"refresh_table_index",
                width:60,
                handler:this.refreshIndexes,
                scope:this
            }]
        },"-",{
            xtype:"buttongroup",
            items:[{
                text:"Preview SQL",
                tooltip:"Preview SQL",
                iconCls:"preview_sql",
                iconAlign:"left",
                handler:this.previewSQL,
                scope:this
            }]
        },{
            width:221,
            disabled:true,
            hidden:true
        },{
            xtype:"buttongroup",
            hidden:true,
            items:[{
                text:"Close Preview",
                tooltip:"Close SQL preview",
                iconCls:"cancel_preview_sql",
                iconAlign:"left",
                handler:this.cancelPreviewSQL,
                scope:this
            }]
        }]
    },
    cancelConfirm:function(){
        Ext.Msg.confirm("Confirmation",Messages.getMsg("cancel_create_table",["cancel changes"]),function(a){
            if(a=="yes"){
                Ext.getCmp("manage_index_panel").refreshStore();
                Ext.getCmp("manage_index_grid").reset()
            }
        });
        return false
    },
    refreshStore:function(){
        Server.sendCommand("get_min_table_indexes",{
            table:Dbl.UserActivity.getValue("database")+"."+Dbl.UserActivity.getValue("table"),
            scope:this
        },function(c){
            if(c.success){
                var a=Ext.getCmp("manage_index_grid").getStore();
                a.removeAll();
                a.loadData(c.data);
                var b=Ext.getCmp("manage_index_panel").getTopToolbar();
                b.get(0).disable();
                Ext.getCmp("manage_index_panel").cancelPreviewSQL()
            }else{
                if(!c.success){
                    Dbl.Utils.showErrorMsg(c.msg,"")
                }
            }
        },function(b){
            var a=b.msg?b.msg:b;
            Dbl.Utils.showErrorMsg(a,"")
        })
    },
    previewSQL:function(){
        var a=this.getTopToolbar();
        a.get(2).hide();
        a.get(3).hide();
        a.get(4).hide();
        a.get(5).hide();
        a.get(6).hide();
        a.get(7).show();
        a.get(8).show();
        this.get("manage_index_grid").hide();
        this.get("index_sql_panel").show()
    },
    cancelPreviewSQL:function(){
        var a=this.getTopToolbar();
        a.get(2).show();
        a.get(3).show();
        a.get(4).show();
        a.get(5).show();
        a.get(6).show();
        a.get(7).hide();
        a.get(8).hide();
        this.get("manage_index_grid").show();
        this.get("index_sql_panel").hide()
    },
    refreshIndexes:function(){
        this.refreshStore();
        Ext.getCmp("manage_index_grid").reset()
    }
});
var Messages={
    messages:{
        noconnection_selected:"Please select a connection first.",
        connection_password:"Please enter the password for {1}.",
        save_and_connect:"Please save the connection before you connect.",
        connection_delete_success:"Connection deleted successfully.",
        save_connection:"Do you want to save changes to {1}?",
        connection_save_success:"Connection saved successfully.",
        truncate_database:"You are going to truncate data for all table(s) in the database ({1}).<br />Are you sure you want to do that?",
        empty_database:"You are going to drop all table(s) in the database ({1}).<br />Are you sure you want to do that?",
        drop_database:"You are going to drop the database ({1}).<br />Are you sure you want to do that?",
        backupdb_notable_selected:"Please select atleast one table to export",
        nodatabase_selected:"Please select a database first.",
        database_import_success:"Database imported successfully.",
        notable_selected:"Please select a table first.",
        truncate_table:"You are going to truncate the table ({1}).<br />Are you sure you want to do that?",
        drop_table:"You are going to drop the table ({1}).<br />Are you sure you want to do that?",
        delete_rows:"Are you sure you want to delete this selected rows(s)?",
        table_field_required:"Table should have at least one field!",
        nofield_selected:"Please select row(s) to delete!",
        drop_column:"You are going to drop the column ({1}) from table ({2}).<br />Are you sure you want to do that?",
        nofield_definitions:"There are no field definitions for this table!<br/>Please, define at least one.",
        nofield_datatype:"Datatype not specified for field name ({1})!",
        cancel_create_table:"Are you sure you want to {1}?",
        notable_selected:"Please select a table from the explorer.",
        duplicate_notable_name:"Please enter new table name!",
        duplicate_nofield_selected:"Please select at least one field!",
        export_table_nocolumn:"Please select atleast one column to export!",
        index_addition_success:"Index added successfully.",
        index_deletion_success:"Index(s) deleted successfully.",
        edit_index_required:"Please select an index to edit!",
        edit_index_single:"Please select a single index to edit!",
        edit_index_footer:"To reorder just change the order of the columns via drag & drop",
        add_index_column_req:"Please select at least one column!",
        delete_index_confirm:"You are going to drop index(s).<br />Are you sure you want to do that?",
        delete_index_required:"Please select index(s) to delete!",
        reorder_columns_header:"To reorder just change the order of the columns <br />via drag & drop and then click on reorder",
        reorder_columns_cancel:"You are going to cancel reordering. <br />Are you sure you want to do that?",
        drop_columns:"Are you sure you want to drop the selected column(s)?",
        nocolumn_selected:"Please select column(s) to drop!",
        noindex_definitions:"There are no index definitions for this table!<br/>Please, define at least one.",
        nocolumns_index:"Columns not specified for index name ({1})!",
        noindex_columns:"Index name not specified for column(s) ({1})!",
        close_editor:"You are going to close an editor that has unsaved changes.<br />Would you like to save your changes?",
        replace_editor_content:" Do you want to replace it?",
        delete_editor:"Are you sure you want to delete this {1}?",
        drop_view:"You are going to drop the view ({1}).<br />Are you sure you want to do that?",
        drop_procedure:"You are going to drop the stored procedure ({1}).<br />Are you sure you want to do that?",
        drop_function:"You are going to drop the function ({1}).<br />Are you sure you want to do that?",
        reset_password_success:"Password reset successfully. Please check your email.",
        current_password_required:"Please enter your current password.",
        account_update_success:"Account details updated successfully.",
        change_password_success:"Password changed successfully.",
        change_email_success:"Email changed successfully.",
        change_username_success:"Username changed successfully.",
        wait_mask:"Wait...",
        load_mask:"Loading...",
        tbd_msg:"to be implemented...",
        no_records:"No records found!",
        empty_form_fields:"Form fields could not be submitted with empty values!",
        prompt_before_leave:"Please make sure you have saved all your changes. Otherwise it will be lost.",
    },
    getMsg:function(a,e){
        if(!a){
            var d="Message id not being passed!";
            Dbl.Utils.showErrorMsg(d)
        }else{
            var c=this.messages[a];
            if(!c){
                return"No message exists for message id `"+a+"`!"
            }else{
                if(e instanceof Array){
                    for(var b=0;b<e.length;b++){
                        c=c.replace("{"+(b+1)+"}",e[b])
                    }
                }
                return c
            }
        }
    }
};
/*
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ns("Ext.ux.form");
Ext.ux.form.MultiSelect=Ext.extend(Ext.form.Field,{
    ddReorder:false,
    appendOnly:false,
    width:100,
    height:100,
    displayField:0,
    valueField:1,
    allowBlank:true,
    minSelections:0,
    maxSelections:Number.MAX_VALUE,
    blankText:Ext.form.TextField.prototype.blankText,
    minSelectionsText:"Minimum {0} item(s) required",
    maxSelectionsText:"Maximum {0} item(s) allowed",
    delimiter:",",
    defaultAutoCreate:{
        tag:"div"
    },
    initComponent:function(){
        Ext.ux.form.MultiSelect.superclass.initComponent.call(this);
        if(Ext.isArray(this.store)){
            if(Ext.isArray(this.store[0])){
                this.store=new Ext.data.ArrayStore({
                    fields:["value","text"],
                    data:this.store
                });
                this.valueField="value"
            }else{
                this.store=new Ext.data.ArrayStore({
                    fields:["text"],
                    data:this.store,
                    expandData:true
                });
                this.valueField="text"
            }
            this.displayField="text"
        }else{
            this.store=Ext.StoreMgr.lookup(this.store)
        }
        this.addEvents({
            dblclick:true,
            click:true,
            change:true,
            drop:true
        })
    },
    onRender:function(c,b){
        Ext.ux.form.MultiSelect.superclass.onRender.call(this,c,b);
        var a=this.fs=new Ext.form.FieldSet({
            renderTo:this.el,
            title:this.legend,
            height:this.height,
            width:this.width,
            style:"padding:0;",
            tbar:this.tbar
        });
        a.body.addClass("ux-mselect");
        this.view=new Ext.ListView({
            multiSelect:true,
            store:this.store,
            columns:[{
                header:"Value",
                width:1,
                dataIndex:this.displayField
            }],
            hideHeaders:true
        });
        a.add(this.view);
        this.view.on("click",this.onViewClick,this);
        this.view.on("beforeclick",this.onViewBeforeClick,this);
        this.view.on("dblclick",this.onViewDblClick,this);
        this.hiddenName=this.name||Ext.id();
        var d={
            tag:"input",
            type:"hidden",
            value:"",
            name:this.hiddenName
        };
            
        this.hiddenField=this.el.createChild(d);
        this.hiddenField.dom.disabled=this.hiddenName!=this.name;
        a.doLayout()
    },
    afterRender:function(){
        Ext.ux.form.MultiSelect.superclass.afterRender.call(this);
        if(this.ddReorder&&!this.dragGroup&&!this.dropGroup){
            this.dragGroup=this.dropGroup="MultiselectDD-"+Ext.id()
        }
        if(this.draggable||this.dragGroup){
            this.dragZone=new Ext.ux.form.MultiSelect.DragZone(this,{
                ddGroup:this.dragGroup
            })
        }
        if(this.droppable||this.dropGroup){
            this.dropZone=new Ext.ux.form.MultiSelect.DropZone(this,{
                ddGroup:this.dropGroup
            })
        }
    },
    onViewClick:function(c,a,b,d){
        this.fireEvent("change",this,this.getValue(),this.hiddenField.dom.value);
        this.hiddenField.dom.value=this.getValue();
        this.fireEvent("click",this,d);
        this.validate()
    },
    onViewBeforeClick:function(c,a,b,d){
        if(this.disabled||this.readOnly){
            return false
        }
    },
    onViewDblClick:function(c,a,b,d){
        return this.fireEvent("dblclick",c,a,b,d)
    },
    getValue:function(a){
        var d=[];
        var c=this.view.getSelectedIndexes();
        if(c.length==0){
            return""
        }
        for(var b=0;b<c.length;b++){
            d.push(this.store.getAt(c[b]).get((a!=null)?a:this.valueField))
        }
        return d.join(this.delimiter)
    },
    setValue:function(a){
        var b;
        var d=[];
        this.view.clearSelections();
        this.hiddenField.dom.value="";
        if(!a||(a=="")){
            return
        }
        if(!Ext.isArray(a)){
            a=a.split(this.delimiter)
        }
        for(var c=0;c<a.length;c++){
            b=this.view.store.indexOf(this.view.store.query(this.valueField,new RegExp("^"+a[c]+"$","i")).itemAt(0));
            d.push(b)
        }
        this.view.select(d);
        this.hiddenField.dom.value=this.getValue();
        this.validate()
    },
    reset:function(){
        this.setValue("")
    },
    getRawValue:function(a){
        var b=this.getValue(a);
        if(b.length){
            b=b.split(this.delimiter)
        }else{
            b=[]
        }
        return b
    },
    setRawValue:function(a){
        setValue(a)
    },
    validateValue:function(a){
        if(a.length<1){
            if(this.allowBlank){
                this.clearInvalid();
                return true
            }else{
                this.markInvalid(this.blankText);
                return false
            }
        }
        if(a.length<this.minSelections){
            this.markInvalid(String.format(this.minSelectionsText,this.minSelections));
            return false
        }
        if(a.length>this.maxSelections){
            this.markInvalid(String.format(this.maxSelectionsText,this.maxSelections));
            return false
        }
        return true
    },
    disable:function(){
        this.disabled=true;
        this.hiddenField.dom.disabled=true;
        this.fs.disable()
    },
    enable:function(){
        this.disabled=false;
        this.hiddenField.dom.disabled=false;
        this.fs.enable()
    },
    destroy:function(){
        Ext.destroy(this.fs,this.dragZone,this.dropZone);
        Ext.ux.form.MultiSelect.superclass.destroy.call(this)
    }
});
Ext.reg("multiselect",Ext.ux.form.MultiSelect);
Ext.ux.Multiselect=Ext.ux.form.MultiSelect;
Ext.ux.form.MultiSelect.DragZone=function(d,c){
    this.ms=d;
    this.view=d.view;
    var b=c.ddGroup||"MultiselectDD";
    var a;
    if(Ext.isArray(b)){
        a=b.shift()
    }else{
        a=b;
        b=null
    }
    Ext.ux.form.MultiSelect.DragZone.superclass.constructor.call(this,this.ms.fs.body,{
        containerScroll:true,
        ddGroup:a
    });
    this.setDraggable(b)
};
    
Ext.extend(Ext.ux.form.MultiSelect.DragZone,Ext.dd.DragZone,{
    onInitDrag:function(a,c){
        var b=Ext.get(this.dragData.ddel.cloneNode(true));
        this.proxy.update(b.dom);
        b.setWidth(b.child("em").getWidth());
        this.onStartDrag(a,c);
        return true
    },
    collectSelection:function(b){
        b.repairXY=Ext.fly(this.view.getSelectedNodes()[0]).getXY();
        var a=0;
        this.view.store.each(function(d){
            if(this.view.isSelected(a)){
                var e=this.view.getNode(a);
                var c=e.cloneNode(true);
                c.id=Ext.id();
                b.ddel.appendChild(c);
                b.records.push(this.view.store.getAt(a));
                b.viewNodes.push(e)
            }
            a++
        },this)
    },
    onEndDrag:function(a,b){
        var c=Ext.get(this.dragData.ddel);
        if(c&&c.hasClass("multi-proxy")){
            c.remove()
        }
    },
    getDragData:function(d){
        var c=this.view.findItemFromChild(d.getTarget());
        if(c){
            if(!this.view.isSelected(c)&&!d.ctrlKey&&!d.shiftKey){
                this.view.select(c);
                this.ms.setValue(this.ms.getValue())
            }
            if(this.view.getSelectionCount()==0||d.ctrlKey||d.shiftKey){
                return false
            }
            var b={
                sourceView:this.view,
                viewNodes:[],
                records:[]
            };
        
            if(this.view.getSelectionCount()==1){
                var a=this.view.getSelectedIndexes()[0];
                var f=this.view.getNode(a);
                b.viewNodes.push(b.ddel=f);
                b.records.push(this.view.store.getAt(a));
                b.repairXY=Ext.fly(f).getXY()
            }else{
                b.ddel=document.createElement("div");
                b.ddel.className="multi-proxy";
                this.collectSelection(b)
            }
            return b
        }
        return false
    },
    getRepairXY:function(a){
        return this.dragData.repairXY
    },
    setDraggable:function(a){
        if(!a){
            return
        }
        if(Ext.isArray(a)){
            Ext.each(a,this.setDraggable,this);
            return
        }
        this.addToGroup(a)
    }
});
Ext.ux.form.MultiSelect.DropZone=function(d,c){
    this.ms=d;
    this.view=d.view;
    var b=c.ddGroup||"MultiselectDD";
    var a;
    if(Ext.isArray(b)){
        a=b.shift()
    }else{
        a=b;
        b=null
    }
    Ext.ux.form.MultiSelect.DropZone.superclass.constructor.call(this,this.ms.fs.body,{
        containerScroll:true,
        ddGroup:a
    });
    this.setDroppable(b)
};
    
Ext.extend(Ext.ux.form.MultiSelect.DropZone,Ext.dd.DropZone,{
    getTargetFromEvent:function(b){
        var a=b.getTarget();
        return a
    },
    getDropPoint:function(g,k,d){
        if(k==this.ms.fs.body.dom){
            return"below"
        }
        var f=Ext.lib.Dom.getY(k),a=f+k.offsetHeight;
        var j=f+(a-f)/2;
        var h=Ext.lib.Event.getPageY(g);
        if(h<=j){
            return"above"
        }else{
            return"below"
        }
    },
    isValidDropPoint:function(b,e,a){
        if(!a.viewNodes||(a.viewNodes.length!=1)){
            return true
        }
        var c=a.viewNodes[0];
        if(c==e){
            return false
        }
        if((b=="below")&&(e.nextSibling==c)){
            return false
        }
        if((b=="above")&&(e.previousSibling==c)){
            return false
        }
        return true
    },
    onNodeEnter:function(d,a,c,b){
        return false
    },
    onNodeOver:function(h,a,g,d){
        var b=this.dropNotAllowed;
        var f=this.getDropPoint(g,h,a);
        if(this.isValidDropPoint(f,h,d)){
            if(this.ms.appendOnly){
                return"x-tree-drop-ok-below"
            }
            if(f){
                var c;
                if(f=="above"){
                    b=h.previousSibling?"x-tree-drop-ok-between":"x-tree-drop-ok-above";
                    c="x-view-drag-insert-above"
                }else{
                    b=h.nextSibling?"x-tree-drop-ok-between":"x-tree-drop-ok-below";
                    c="x-view-drag-insert-below"
                }
                if(this.lastInsertClass!=c){
                    Ext.fly(h).replaceClass(this.lastInsertClass,c);
                    this.lastInsertClass=c
                }
            }
        }
        return b
    },
    onNodeOut:function(d,a,c,b){
        this.removeDropIndicators(d)
    },
    onNodeDrop:function(b,j,h,f){
        if(this.ms.fireEvent("drop",this,b,j,h,f)===false){
            return false
        }
        var k=this.getDropPoint(h,b,j);
        if(b!=this.ms.fs.body.dom){
            b=this.view.findItemFromChild(b)
        }
        if(this.ms.appendOnly){
            insertAt=this.view.store.getCount()
        }else{
            insertAt=b==this.ms.fs.body.dom?this.view.store.getCount()-1:this.view.indexOf(b);
            if(k=="below"){
                insertAt++
            }
        }
        var c=false;
        if(f.sourceView==this.view){
            if(k=="below"){
                if(f.viewNodes[0]==b){
                    f.viewNodes.shift()
                }
            }else{
                if(f.viewNodes[f.viewNodes.length-1]==b){
                    f.viewNodes.pop()
                }
            }
            if(!f.viewNodes.length){
                return false
            }
            if(insertAt>this.view.store.indexOf(f.records[0])){
                c="down";
                insertAt--
            }
        }
        for(var g=0;g<f.records.length;g++){
            var a=f.records[g];
            if(f.sourceView){
                f.sourceView.store.remove(a)
            }
            this.view.store.insert(c=="down"?insertAt:insertAt++,a);
            var d=this.view.store.sortInfo;
            if(d){
                this.view.store.sort(d.field,d.direction)
            }
        }
        return true
    },
    removeDropIndicators:function(a){
        if(a){
            Ext.fly(a).removeClass(["x-view-drag-insert-above","x-view-drag-insert-left","x-view-drag-insert-right","x-view-drag-insert-below"]);
            this.lastInsertClass="_noclass"
        }
    },
    setDroppable:function(a){
        if(!a){
            return
        }
        if(Ext.isArray(a)){
            Ext.each(a,this.setDroppable,this);
            return
        }
        this.addToGroup(a)
    }
});
var RenameTablePanel=function(d,c){
    var a=[{
        fieldLabel:"New table name",
        name:"rename",
        value:c
    },{
        name:"table",
        xtype:"hidden",
        value:c
    },{
        name:"nodeid",
        xtype:"hidden",
        value:d
    }];
    var b=[{
        text:"rename",
        handler:this.renameTable
    },{
        text:"cancel",
        handler:this.cancelRenamingTable
    }];
    RenameTablePanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"rename_table_form",
        frame:true,
        labelWidth:100,
        defaultType:"textfield",
        defaults:{
            width:150
        },
        items:a,
        buttons:b
    })
};
    
Ext.extend(RenameTablePanel,Ext.form.FormPanel,{
    renameTable:function(){
        var a=Ext.getCmp("rename_table_form").getForm().getFieldValues();
        Database.sendCommand("rename_table",{
            table:a.table,
            rename:a.rename,
            database:Explorer.selectedDatabase
        },function(c){
            if(c.success){
                Ext.getCmp("rename_table_window").close();
                var b=Explorer.explorerTreePanelObj.getNodeById(a.nodeid);
                if(b){
                    b.setText(a.rename);
                    b.setId(a.rename)
                }
                Explorer.selectedTable=a.rename
            }else{
                if(!c.success){
                    Dbl.Utils.showErrorMsg(c.msg,"")
                }
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"")
        })
    },
    cancelRenamingTable:function(){
        Ext.getCmp("rename_table_window").close()
    }
});
var ReorderColumnsPanel=function(b){
    var a=new Ext.data.SimpleStore({
        fields:b.cols
    });
    a.loadData(b.rows);
    ReorderColumnsPanel.superclass.constructor.call(this,{
        title:Messages.getMsg("reorder_columns_header"),
        id:"reorder_columns_grid",
        height:350,
        store:a,
        columns:b.columns,
        columnLines:true,
        ddGroup:"mygridDD",
        enableDragDrop:true,
        autoScroll:true,
        viewConfig:{},
        sm:new Ext.grid.RowSelectionModel({
            singleSelect:true
        }),
        listeners:{
            render:{
                scope:this,
                fn:function(d){
                    var c=new Ext.dd.DropTarget(d.container,{
                        ddGroup:"mygridDD",
                        copy:false,
                        notifyDrop:function(f,l,k){
                            Ext.getCmp("reorder_columns_window").reorderButton.enable();
                            var j=d.store;
                            var m=d.getSelectionModel();
                            var h=m.getSelections();
                            if(f.getDragData(l)){
                                var g=f.getDragData(l).rowIndex;
                                if(typeof(g)!="undefined"){
                                    for(i=0;i<h.length;i++){
                                        j.remove(j.getById(h[i].id))
                                    }
                                    j.insert(g,k.selections);
                                    m.clearSelections()
                                }
                            }
                        }
                    })
                }
            }
        }
    })
};

Ext.extend(ReorderColumnsPanel,Ext.grid.GridPanel,{
    reorderColumns:function(g){
        var b=this;
        var d=Ext.getCmp("reorder_columns_grid").getStore();
        var a=d.data.items;
        var f=new Array();
        for(var e=0;e<a.length;e++){
            var c=a[e].data;
            if(c.column){
                f.push(c)
            }
        }
        Server.sendCommand("reorder_table_columns",{
            database:Explorer.selectedDatabase,
            tablename:g,
            reorderedColumns:Ext.encode(f)
        },function(h){
            if(h.success){
                Explorer.selectedTable=g;
                Ext.Msg.show({
                    title:"Success",
                    msg:h.msg,
                    buttons:Ext.Msg.OK,
                    fn:b.cancelReorder,
                    animEl:document.body,
                    icon:Ext.MessageBox.INFO
                })
            }else{
                if(!h.success){
                    Dbl.Utils.showErrorMsg(h.msg,"")
                }
            }
        },function(j){
            var h=j.msg?j.msg:j;
            Dbl.Utils.showErrorMsg(h,"")
        })
    },
    cancelConfirm:function(){
        var a=this;
        Ext.Msg.confirm("Confirmation",Messages.getMsg("reorder_columns_cancel"),function(b){
            if(b=="yes"){
                a.cancelReorder()
            }
        })
    },
    cancelReorder:function(){
        Ext.getCmp("reorder_columns_window").close();
        Dblite.dataPanel.refresh(true)
    }
});
var RestoreDbPanel=function(a){
    RestoreDbPanel.superclass.constructor.call(this,{
        id:"restore_db",
        region:"center",
        xtype:"panel",
        layout:"fit",
        items:[this.createForm(a)]
    })
};
    
Ext.extend(RestoreDbPanel,Ext.Panel,{
    createForm:function(a){
        return new Ext.FormPanel({
            fileUpload:true,
            frame:true,
            labelAlign:"top",
            name:"restore_db_form",
            id:"restore_db_form",
            defaults:{
                anchor:"90%",
                allowBlank:false
            },
            items:[{
                xtype:"tbtext",
                text:"Current DB: <b>"+a+"</b>",
                anchor:"100%"
            },{
                xtype:"hidden",
                name:"database",
                value:a
            },{
                xtype:"hidden",
                name:"connection_id",
                value:Server.connection_id
            },{
                xtype:"fileuploadfield",
                id:"restore_db_file",
                emptyText:"Select a file to execute",
                buttonText:"Upload"
            }],
            buttons:[{
                text:"Execute",
                handler:function(){
                    var b=Ext.getCmp("restore_db_form").getForm();
                    if(b.isValid()){
                        var c=new Ext.LoadMask("restore_db",{
                            msg:"Loading..."
                        });
                        c.show();
                        b.submit({
                            url:MAIN_URL+"/cmd.php?command=import.import_db&form=1",
                            params:{
                                connection_id:Server.connection_id
                            },
                            success:function(d,e){
                                if(e.result.success=="pass"){
                                    c.hide();
                                    Dbl.Utils.showInfoMsg(Messages.getMsg("database_import_success"),"restore_db");
                                    if(a!="none"){
                                        Explorer.explorerPanel.removeAll();
                                        Explorer.loadExplorerData(a)
                                    }
                                }else{
                                    c.hide();
                                    Dbl.Utils.showInfoMsg(e.result.msg,"restore_db")
                                }
                            }
                        })
                    }
                }
            }]
        })
    }
});
Dbl.ResultDataPanel=function(a,c){
    var d=this.getTopBar(a,c);
    var b=this.getChildPanel(a,c);
    return new Ext.Panel({
        id:"result_tab_"+c,
        title:c+". Result",
        result_file:a.result_separator,
        iconCls:"tabs",
        sql:a.sql,
        layout:"fit",
        tbar:d,
        closable:true,
        items:[b],
        listeners:{
            activate:this.activate,
            beforeclose:this.handleBeforeClose,
            scope:this
        }
    })
};

Ext.extend(Dbl.ResultDataPanel,Ext.Panel,{
    activate:function(a){
        a.doLayout()
    },
    handleBeforeClose:function(a){
        this.checkAndStopTaskRunner(a);
        Editor.deleteResultFiles(a.result_file)
    },
    checkAndStopTaskRunner:function(a){
        var b=a.getId().substr(11);
        if(a.autorefresh_lap){
            var c=Ext.getCmp("result_tbar_"+b).getTopToolbar();
            var d=c.items.get(6).items.get(1);
            Dbl.Utils.stopTaskRunner(d.updatetask,d.updaterunner,d.delayedtask)
        }
    },
    getChildPanel:function(a,c){
        var b={};
    
        if(a.hasError){
            b={
                border:false,
                html:a.msg,
                bodyStyle:"padding: 5px"
            }
        }else{
            if(a.isSelectSQL){
                b=new Dbl.ResultGridPanel(a,c)
            }else{
                if(!a.isSelectSQL){
                    b={
                        border:false,
                        html:a.execution_status,
                        bodyStyle:"padding: 5px"
                    }
                }
            }
        }
        return b
    },
    createToolbar:function(d,b){
        var a=this.getRefreshButtonGroup(d,b);
        var c=[{
            xtype:"buttongroup",
            disabled:d.hasError?true:false,
            items:[{
                text:"Export",
                id:"export_"+b,
                tooltip:"Export result set",
                iconCls:"copy_table",
                width:75,
                disabled:(!d.isSelectSQL)?true:false,
                handler:this.exportData.createDelegate(this)
            }]
        },"-",{
            xtype:"buttongroup",
            disabled:false,
            items:[{
                text:"Show SQL",
                id:"show_sql_"+b,
                tooltip:"Show SQL",
                iconCls:"preview_sql",
                width:90,
                handler:this.showSQL.createCallback(b)
            },{
                text:"Hide SQL",
                id:"hide_sql_"+b,
                tooltip:"Hide SQL",
                iconCls:"cancel_preview_sql",
                width:90,
                hidden:true,
                handler:this.hideSQL.createCallback(b)
            }]
        },"-"];
        return c.concat(a)
    },
    exportData:function(){
        var a=Dblite.dataPanel.getActiveTab();
        var b=a.getId();
        var d=b.substr(11);
        var c=Ext.getCmp("result_grid_"+d).getStore();
        var g=new Array();
        for(var e=0;e<c.fields.items.length;e++){
            g[e]=new Array(c.fields.items[e].name)
        }
        var f={};
    
        f.data=g;
        f.curr_table="";
        f.sql=a.sql;
        f.curr_db=Explorer.selectedDatabase;
        this.win=new Dbl.ContextMenuWindow({
            title:"Export Result Set",
            id:"export_table",
            width:560,
            height:240,
            onEsc:function(){},
            items:[new Dbl.ExportTableDbPanel(f)]
        });
        this.win.show()
    },
    refreshCurrentPage:function(){
        var a=Dblite.dataPanel.getActiveTab();
        var b=a.getId();
        b=b.substr(11);
        Server.sendCommand("database.execute_queries",{
            sql:a.sql,
            sqldelim:Editor.defaultSQLDelimiter,
            scope:this
        },function(c){
            a.removeAll();
            a.add(this.getChildPanel(c[0],b));
            a.doLayout()
        },function(d){
            var c=d.msg?d.msg:d;
            DbliteUtils.showErrorMsg(c,"")
        })
    },
    getTopBar:function(a,c){
        var b={
            id:"result_sql_"+c,
            xtype:"uxCodeMirrorPanel",
            parser:"sql",
            padding:"2",
            autoScroll:true,
            hidden:true,
            border:false,
            sourceCode:a.sql,
            codeMirror:{
                height:"25%",
                width:"100%",
                lineNumbers:false,
                readOnly:true
            }
        };
    
        return new Ext.Panel({
            id:"result_tbar_"+c,
            autoScroll:true,
            border:false,
            layout:"fit",
            tbar:this.createToolbar(a,c),
            items:[b]
        })
    },
    showSQL:function(a){
        Ext.getCmp("show_sql_"+a).hide();
        Ext.getCmp("hide_sql_"+a).show();
        Ext.getCmp("result_tbar_"+a).get("result_sql_"+a).show();
        Ext.getCmp("result_tbar_"+a).doLayout()
    },
    hideSQL:function(a){
        Ext.getCmp("hide_sql_"+a).hide();
        Ext.getCmp("show_sql_"+a).show();
        Ext.getCmp("result_tbar_"+a).get("result_sql_"+a).hide();
        Ext.getCmp("result_tbar_"+a).doLayout()
    },
    getRefreshButtonGroup:function(e,c){
        var b={
            text:"Refresh",
            id:"refresh_table_"+c,
            tooltip:"Execute SQL",
            iconCls:"table_data_refresh",
            width:75,
            handler:this.refreshCurrentPage.createDelegate(this),
        };
    
        var d={
            text:"Auto Refresh",
            tooltip:"Auto execute SQL",
            iconCls:"table_data_refresh",
            iconAlign:"left",
            width:75,
            menu:{
                xtype:"menu",
                plain:true,
                items:[{
                    xtype:"form",
                    labelWidth:75,
                    frame:true,
                    header:false,
                    border:false,
                    width:200,
                    defaults:{
                        width:98
                    },
                    defaultType:"textfield",
                    items:[{
                        fieldLabel:"Interval(sec)",
                        name:"second",
                        minValue:1,
                        maxValue:86400,
                        value:10
                    }],
                    buttons:[{
                        text:"Start",
                        tooltip:"Start auto refresh",
                        width:75,
                        handler:function(){
                            var j=Ext.getCmp("result_tbar_"+c).getTopToolbar();
                            j.items.get(0).disable();
                            j.items.get(2).disable();
                            var g=j.items.get("tabledata_refresh_btns_"+c);
                            var h=g.items.get(1).menu.items.get(0);
                            var f=h.getForm().getFieldValues();
                            if(f.second<1||f.second>86400){
                                return false
                            }
                            g.items.get(1).menu.hide();
                            g.disable();
                            g.nextSibling().show();
                            g.nextSibling().nextSibling().show();
                            Ext.getCmp("result_tab_"+c).autorefresh_lap=f.second;
                            Dbl.Utils.startTaskRunner(f.second,"",{
                                index:c
                            },"","SQLRESULT")
                        }
                    },{
                        text:"Cancel",
                        tooltip:"Cancel auto refresh",
                        width:75,
                        handler:function(){
                            var g=Ext.getCmp("result_tbar_"+c).getTopToolbar();
                            var f=g.items.get("tabledata_refresh_btns_"+c);
                            f.items.get(1).menu.hide()
                        }
                    }]
                }]
            }
        };

        var a={
            text:"Stop",
            tooltip:"Stop auto refresh",
            iconCls:"stop_auto_refresh",
            handler:function(){
                Ext.getCmp("result_tab_"+c).autorefresh_lap=null;
                var g=Ext.getCmp("result_tbar_"+c).getTopToolbar();
                g.items.get(0).enable();
                g.items.get(2).enable();
                var f=g.items.get("tabledata_refresh_btns_"+c);
                f.enable();
                f.nextSibling().hide();
                f.nextSibling().nextSibling().hide();
                Dbl.Utils.stopTaskRunner(this.updatetask,this.updaterunner,this.delayedtask)
            }
        };

        return[{
            xtype:"buttongroup",
            disabled:e.hasError?true:false,
            id:"tabledata_refresh_btns_"+c,
            disabled:false,
            items:[b,d]
        },{
            xtype:"tbseparator",
            hidden:true,
        },{
            xtype:"buttongroup",
            hidden:true,
            items:[{
                iconAlign:"left",
                text:"Refreshing automatically",
                width:200
            },a]
        }]
    }
});
Dbl.ResultGridPanel=function(d,b){
    this.gridindex=b;
    this.sql=d.sql;
    this.cols=d.cols;
    this.models=d.columns;
    this.shorts=[];
    this.result_separator=d.result_separator;
    var a=new Ext.data.SimpleStore({
        url:MAIN_URL+"/cmd.php?command=get_result_data&form=1",
        baseParams:{
            sql:this.sql,
            result_separator:this.result_separator,
            database:Dbl.UserActivity.getValue("database"),
            connection_id:Dbl.UserActivity.getValue("connection")
        },
        root:"results",
        totalProperty:"total",
        fields:this.cols
    });
    this.store=a;
    a.load({
        params:{
            start:0,
            limit:50,
            result_separator:this.result_separator
        },
        callback:function(){
            Ext.getCmp("result_grid_"+b).autoSizeColumns();
            Ext.getCmp("result_tab_"+b).setIconClass(" ")
        }
    });
    var c=new Ext.grid.ColumnModel({
        columns:this.models
    });
    Dbl.ResultGridPanel.superclass.constructor.call(this,{
        id:"result_grid_"+b,
        store:a,
        cm:c,
        columnLines:true,
        border:false,
        viewConfig:{},
        listeners:{
            viewready:this.autoSizeColumns,
            cellclick:this.showContent,
            cellcontextmenu:this.onCellContextMenu,
            afterlayout:function(){},
            scope:this
        },
        bbar:this.buildBottomPaginator(a,b),
    })
};

Ext.extend(Dbl.ResultGridPanel,Ext.grid.GridPanel,{
    autoSizeColumns:function(){
        var a=new Array();
        this.colModel.suspendEvents();
        for(var b=1;b<this.colModel.getColumnCount();b++){
            this.colModel.setRenderer(b,Ext.util.Format.htmlEncode);
            this.autoSizeColumn(b)
        }
        this.colModel.resumeEvents();
        this.view.refresh(true)
    },
    autoSizeColumn:function(f){
        var d=this.view.getHeaderCell(f).firstChild.scrollWidth;
        for(var e=0;e<this.store.getCount();e++){
            var a=this.view.getCell(e,f).firstChild;
            var b=a.scrollWidth;
            d=Math.max(d,b);
            if(d>300){
                d=300;
                this.shorts[f]=true
            }
        }
        if(!d){
            return
        }
        this.colModel.setColumnWidth(f,d+2);
        return d
    },
    showContent:function(b,g,c,d){
        if(!this.shorts[c]){
            return
        }
        var a=b.getStore().getAt(g);
        var f=b.getColumnModel().getDataIndex(c);
        var e=a.get(f);
        Dblite.showWindow({
            html:Ext.util.Format.htmlEncode(e),
            width:400,
            height:400,
            padding:10,
            autoScroll:true
        })
    },
    buildBottomPaginator:function(a,b){
        this.paginator=new Ext.PagingToolbar({
            id:"result_data_paginator_"+b,
            pageSize:50,
            store:a,
            displayInfo:true,
            displayMsg:"Displaying {0} - {1} of {2}",
            emptyMsg:"No data to display",
            width:"100%",
            style:{
                borderWidth:"0px"
            }
        });
        var c=new Ext.Toolbar({
            items:[this.paginator]
        });
        return c
    },
    onCellContextMenu:function(b,g,a,f){
        f.stopEvent();
        if(this.menu){
            this.menu.removeAll()
        }
        var c="result_cell_context";
        var d=[this.executeSQL(b,g,a,f),this.exportResultData(b,g,a,f),"-",this.showSQL(b,g,a,f),"-",this.copyCellDataToClipboard(b,g,a,f),this.copyAllRowsToClipboard(b,g,a,f)];
        this.menu=new Ext.menu.Menu({
            id:c,
            items:d,
            defaults:{
                scale:"small",
                width:"100%",
                iconAlign:"left"
            }
        });
        this.menu.showAt(f.getXY())
    },
    executeSQL:function(b,d,a,c){
        return{
            itemId:"execute_sql",
            text:"Execute SQL",
            iconCls:"execute_query",
            disabled:Ext.getCmp("result_tab_"+b.gridindex).autorefresh_lap?true:false,
            listeners:{
                click:function(g,f){
                    var e=Dblite.dataPanel.getActiveTab();
                    Server.sendCommand("database.execute_queries",{
                        sql:e.sql,
                        sqldelim:Editor.defaultSQLDelimiter,
                        scope:this
                    },function(j){
                        var h=new Dbl.ResultGridPanel(j[0],b.gridindex);
                        e.removeAll();
                        e.add(h);
                        e.doLayout()
                    },function(j){
                        var h=j.msg?j.msg:j;
                        DbliteUtils.showErrorMsg(h,"")
                    })
                }
            }
        }
    },
    exportResultData:function(b,d,a,c){
        return{
            itemId:"export_result_data",
            text:"Export Result Set",
            iconCls:"copy_table",
            disabled:Ext.getCmp("result_tab_"+b.gridindex).autorefresh_lap?true:false,
            listeners:{
                click:function(k,g){
                    var e=b.getStore();
                    var j=new Array();
                    for(var f=0;f<e.fields.items.length;f++){
                        j[f]=new Array(e.fields.items[f].name)
                    }
                    var h={};
                
                    h.data=j;
                    h.curr_table="";
                    h.sql=b.sql;
                    h.curr_db=Dbl.UserActivity.getValue("database");
                    this.window=new Dbl.ContextMenuWindow({
                        title:"Export Result Set",
                        id:"export_table",
                        width:560,
                        height:240,
                        onEsc:function(){},
                        items:[new Dbl.ExportTableDbPanel(h)]
                    });
                    this.window.show()
                }
            }
        }
    },
    showSQL:function(b,d,a,c){
        return{
            itemId:"show_sql",
            text:"Show SQL",
            iconCls:"preview_sql",
            disabled:Ext.getCmp("result_tab_"+b.gridindex).autorefresh_lap?true:false,
            listeners:{
                click:function(f,e){
                    Ext.getCmp("show_sql_"+b.gridindex).hide();
                    Ext.getCmp("hide_sql_"+b.gridindex).show();
                    Ext.getCmp("result_tbar_"+b.gridindex).get("result_sql_"+b.gridindex).show();
                    Ext.getCmp("result_tbar_"+b.gridindex).doLayout()
                }
            }
        }
    },
    copyCellDataToClipboard:function(b,d,a,c){
        return{
            itemId:"copy_cell_data",
            text:"Copy Cell Data To Clipboard",
            iconCls:"copy_cell_to_clipboard",
            disabled:Ext.getCmp("result_tab_"+b.gridindex).autorefresh_lap?true:false,
            listeners:{
                click:function(f,e){
                    Dbl.Utils.showTBDMsg()
                }
            }
        }
    },
    copyAllRowsToClipboard:function(b,d,a,c){
        return{
            itemId:"copy_all_rows",
            text:"Copy All Rows To Clipboard",
            iconCls:"copy_rows_to_clipboard",
            disabled:Ext.getCmp("result_tab_"+b.gridindex).autorefresh_lap?true:false,
            listeners:{
                click:function(f,e){
                    Dbl.Utils.showTBDMsg()
                }
            }
        }
    },
});
Dbl.SaveAsPanel=function(d,e,c,b){
    var a=this.getFolderList(d,b);
    Dbl.SaveAsPanel.superclass.constructor.call(this,{
        id:"editor_save_form",
        labelWidth:80,
        bodyBorder:true,
        frame:true,
        defaults:{
            width:200
        },
        defaultType:"textfield",
        monitorValid:true,
        items:[{
            fieldLabel:"File name",
            name:"file_name",
            allowBlank:false,
            vtype:"alphanum",
            value:c
        },a],
        buttons:[{
            text:"Save",
            formBind:true,
            handler:function(){
                Editor.editorSaveForm(false,e)
            }
        }]
    })
};

Ext.extend(Dbl.SaveAsPanel,Ext.form.FormPanel,{
    getFolderList:function(b,a){
        return new Ext.form.ComboBox({
            store:new Ext.data.SimpleStore({
                fields:["folder_name"],
                data:b
            }),
            displayField:"folder_name",
            typeAhead:true,
            forceSelection:false,
            selectOnFocus:true,
            mode:"local",
            triggerAction:"all",
            emptyText:"Select a folder",
            fieldLabel:"Folder name",
            name:"folder_name",
            value:a
        })
    }
});
var SelectableListViewPanel=function(b){
    var a=new Ext.grid.CheckboxSelectionModel({
        checkOnly:true,
        init:function(d){
            this.grid=d;
            this.initEvents()
        }
    });
    var c=new Array(a);
    b.models=c.concat(b.models);
    b.sm=a;
    SelectableListViewPanel.superclass.constructor.call(this,b)
};

Ext.extend(SelectableListViewPanel,Dbl.ListViewPanel,{});
var Server={
    connection_id:"",
    connection_database:"",
    command_count:1,
    commands:{},
    responseXhr:null,
    serverChanged:function(a,b){
        Server.responseXhr=null;
        Server.connection_id=a;
        Server.connection_database=b;
        if(!Server.restoring){
            Dbl.UserActivity.explorerPanel.newConnectionSelected(a,b)
        }
        if(!a||a.length<=0){
            return
        }
        Dbl.Utils.setDatapanelTabsTitle();
        if(Dblite.dataPanel){
            Dblite.dataPanel.refresh(true)
        }
    },
    sendCommand:function(g,f,e,b){
        var a=Server.command_count++;
        Server.commands[a]={
            command:g,
            success:e,
            error:b,
            params:f
        };
    
        if(0){
            $.post("command.php",{
                id:a,
                command:g,
                params:$.param(f)
            });
            Server.receiveResponse()
        }else{
            var d=new Ext.data.Connection();
            if(Dbl.UserActivity.getValue("database")&&!f.testConnection&&!f.noautodb){
                f.database=Dbl.UserActivity.getValue("database")
            }
            f.connection_id=(f.connection_id)?f.connection_id:Server.connection_id;
            var c=this;
            if(f.scope){
                c=f.scope;
                delete f.scope
            }
            var f={
                connection_id:Server.connection_id,
                id:a,
                command:g,
                params:Ext.encode(f)
            };
            
            d.request({
                url:MAIN_URL+"/cmd.php",
                method:"POST",
                params:f,
                scope:c,
                success:Server.handleResponseData
            })
        }
    },
    handleResponseData:function(g,c){
        var d=g.responseText;
        var e=JSON&&JSON.parse(d)||$.parseJSON(d);
        var f=Server.commands[e.id];
        if(f.success&&e.data.success){
            if(Dblite.historytab){
                Dbl.Utils.pushDataToHistory(e.data.history_data)
            }
            if(c.scope){
                var b=f.success.createDelegate(c.scope);
                b(e.data.data)
            }else{
                f.success(e.data.data)
            }
        }else{
            if(f.error){
                if(c.scope){
                    var b=f.error.createDelegate(c.scope);
                    b(e.data.msg)
                }else{
                    f.error(e.data.msg)
                }
            }else{
                Dbl.Utils.showErrorMsg(e.data.msg,"")
            }
        }
    },
    receiveResponse:function(){
        if(Server.responseXhr){
            return
        }
        $.ajax({
            method:"post",
            cache:false,
            url:"response.php",
            data:{
                connection_id:Server.connection_id
            },
            beforeSend:function(a){
                a.onreadystatechange=function(){
                    var c=a.responseText;
                    if(a.readyState==3){
                        var b=c.lastIndexOf("--++--")+6;
                        var d=c.substring(b);
                        Server.handleResponseData(d)
                    }
                    if(a.readyState==4){
                        Server.responseXhr=null;
                        Server.receiveResponse();
                        return
                    }
                };
            
                Server.responseXhr=a
            }
        })
    }
};

Dbl.ServerStructurePanel=function(){
    Dbl.ServerStructurePanel.superclass.constructor.call(this,{
        activeItem:Dbl.UserActivity.getValue("activeConnTab"),
        cls:"dbl-subtab",
        margins:"0 5 0 5",
        resizeTabs:true,
        minTabWidth:115,
        tabPosition:"top",
        border:false,
        enableTabScroll:true,
        items:[{
            id:"db_list",
            title:"Databases",
            layout:"fit",
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"variables",
            title:"Variables",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"statuses",
            title:"Status",
            layout:"fit",
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"processlist",
            title:"Process List",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        }]
    })
};
    
Ext.extend(Dbl.ServerStructurePanel,Ext.TabPanel,{
    activate1:function(){
        var a=this.getActiveTab().id;
        Dbl.UserActivity.dataPanel.serverTabChanged(a);
        Dbl.Utils.addLoadingIcon();
        if(!Server.connection_id){
            this.showMsgPanel(Messages.getMsg("noconnection_selected"));
            Dbl.Utils.removeLoadingIcon()
        }else{
            if(a=="db_list"){
                this.showPanel("get_server_databases")
            }else{
                if(a=="variables"){
                    this.showPanel("get_server_variables")
                }else{
                    if(a=="statuses"){
                        this.showPanel("get_server_status")
                    }else{
                        if(a=="processlist"){
                            this.showPanel("get_server_processes")
                        }
                    }
                }
            }
        }
    },
    showMsgPanel:function(b){
        var a=this.getActiveTab();
        a.removeAll();
        a.add({
            padding:"10px",
            border:false,
            html:b
        });
        a.doLayout()
    },
    showPanel:function(b){
        var a=this.getActiveTab();
        if(a.connection==Dbl.UserActivity.getValue("connection")){
            Dbl.Utils.removeLoadingIcon();
            a.doLayout();
            return
        }
        Database.sendCommand(b,{
            asView:true,
            refreshable:true,
            connectiondb:Dbl.UserActivity.getValue("connection_db")
        },function(c){
            a.removeAll();
            a.add(c.panel);
            a.doLayout();
            a.connection=Server.connection_id
        })
    }
});
Dbl.SQLBrowserPanel=function(a){
    Dbl.SQLBrowserPanel.superclass.constructor.call(this,{
        autoScroll:true,
        animate:true,
        animCollapse:true,
        rootVisible:false,
        useArrows:true,
        border:false,
        root:new Ext.tree.AsyncTreeNode({
            id:"root",
            expanded:true,
            children:a
        }),
        keys:[{
            key:Ext.EventObject.DELETE,
            handler:this.handleNodeDeletion,
            stopEvent:true,
            scope:this
        },{
            key:Ext.EventObject.F2,
            handler:this.handleNodeRename,
            stopEvent:true,
            scope:this
        }],
        loader:new Ext.tree.TreeLoader({
            dataUrl:" ",
            preloadChildren:true,
            listeners:{
                beforeload:function(c,b){
                    this.baseParams.category=b.attributes.category;
                    this.baseParams.parent=b.parentNode.attributes.text;
                    Server.sendCommand("editor.get_saved_queries",{
                        category:b.attributes.category,
                        node:b.text,
                        parent:b.parentNode.attributes.text
                    },function(d){
                        b.appendChild(d);
                        return false
                    },function(e){
                        var d=e.msg?e.msg:e;
                        Dbl.Utils.showErrorMsg(d,"")
                    })
                }
            }
        }),
        listeners:{
            click:this.onClick,
            contextmenu:this.onClick,
            contextmenu:this.onContextMenu,
            scope:this
        }
    })
};

Ext.extend(Dbl.SQLBrowserPanel,Ext.tree.TreePanel,{
    selectedQueryFolder:"",
    selectedQueryFile:"",
    selectedNodeType:"",
    queryTreePanelEditor:"",
    onClick:function(a,b){
        this.selectedQueryFolder=a.attributes.folder_name;
        this.selectedQueryFile=a.attributes.file_name;
        this.selectedNodeType=a.attributes.category;
        if(a.attributes.category=="file"){
            this.createEditorFromSavedQuery()
        }
    },
    onContextMenu:function(b,d){
        if((b.attributes.category!="file")&&(b.attributes.category!="folder")){
            return
        }
        if(this.menu){
            this.menu.removeAll()
        }
        this.getSelectionModel().select(b);
        var f=b.attributes.id;
        var a="";
        var c=[];
        if(b.attributes.category=="folder"){
            a=f+"-folder-node-ctx";
            c=[{
                itemId:"delete_folder_"+f,
                text:"Delete Folder...",
                iconCls:"folder_delete",
                listeners:{
                    click:this.handleNodeDeletion,
                    scope:this
                }
            }]
        }else{
            if(b.attributes.category=="file"){
                a=f+"-file-node-ctx";
                c=[{
                    itemId:"rename_file_"+f,
                    text:"Rename File...",
                    iconCls:"page_rename",
                    listeners:{
                        click:this.handleNodeRename,
                        scope:this
                    }
                },"-",{
                    itemId:"delete_file_"+f,
                    text:"Delete File...",
                    iconCls:"page_delete",
                    listeners:{
                        click:this.handleNodeDeletion,
                        scope:this
                    }
                }]
            }
        }
        this.menu=new Ext.menu.Menu({
            id:a,
            items:c,
            defaults:{
                scale:"small",
                width:"100%",
                iconAlign:"left"
            }
        });
        this.menu.showAt(d.getXY())
    },
    handleNodeDeletion:function(){
        var b=this.getSelectionModel().getSelectedNode();
        var a=this;
        Ext.MessageBox.confirm("Confirmation",Messages.getMsg("delete_editor",[b.attributes.category]),function(c){
            if(c=="yes"){
                if(b.attributes.category=="folder"){
                    a.handleFolderDeletion(b)
                }
                if(b.attributes.category=="file"){
                    a.handleFileDeletion(b)
                }
            }
        })
    },
    handleFolderDeletion:function(b){
        b=(!b)?this.getSelectionModel().getSelectedNode():b;
        var c=b.attributes.id;
        var a=b.attributes.folder_name;
        Editor.deleteQueryEditor("","",a,c)
    },
    handleFileDeletion:function(f){
        f=(!f)?this.getSelectionModel().getSelectedNode():f;
        var g=f.attributes.id;
        var e=f.attributes.folder_name;
        var c=f.attributes.file_name;
        var a="";
        for(var b=0;b<Editor.tabPanel.items.length;b++){
            var d=Editor.tabPanel.items.items[b];
            if((d.foldername==e)&&(d.filename==c)){
                a=d
            }
        }
        Editor.deleteQueryEditor(a,c,e,g)
    },
    handleNodeRename:function(){
        var a=this.getSelectionModel().getSelectedNode();
        if(a.attributes.category=="file"){
            this.renameFile(a)
        }
    },
    renameFile:function(a){
        this.queryTreePanelEditor.editNode=a;
        this.queryTreePanelEditor.startEdit(a.ui.textNode)
    },
    createEditorFromSavedQuery:function(){
        for(var a=0;a<Editor.tabPanel.items.length;a++){
            var b=Editor.tabPanel.items.items[a];
            if((b.foldername==this.selectedQueryFolder)&&(b.filename==this.selectedQueryFile)){
                Editor.tabPanel.activate(b);
                return
            }
        }
        Server.sendCommand("editor.get_query_file_content",{
            category:"file",
            folder:this.selectedQueryFolder,
            file:this.selectedQueryFile,
            scope:this
        },function(d){
            if(d.success){
                var c=d.content;
                if(!c){
                    c=""
                }
                Editor.restoreEditor(d.content,this.selectedQueryFile,this.selectedQueryFolder)
            }else{
                if(!d.success){
                    Dbl.Utils.showErrorMsg(d.msg,"")
                }
            }
        },function(d){
            var c=d.msg?d.msg:d;
            Dbl.Utils.showErrorMsg(c,"")
        })
    },
    attachNodeEditor:function(a){
        a.queryTreePanelEditor=new Ext.tree.TreeEditor(Editor.browserPanel,{},{
            allowBlank:false,
            blankText:"File name is required",
            selectOnFocus:true,
            ignoreNoChange:true,
            cancelOnEsc:false,
            completeOnEnter:true,
            listeners:{
                beforecomplete:this.handleAfterEdit,
                scope:this
            }
        })
    },
    handleAfterEdit:function(c,a,b){
        if(a.length<1){
            return false
        }
        var d=c.editNode.attributes.folder_name;
        Server.sendCommand("editor.rename_query_file",{
            folder:d,
            oldFilename:b,
            newFilename:a,
            scope:this
        },function(f){
            var e=Editor.tabPanel.getActiveTab();
            e.filename=a;
            e.setTitle(a);
            c.editNode.attributes.file_name=a;
            Ext.fly(e.tabEl).child("span.x-tab-strip-text",true).qtip=a;
            var g=(c.editNode.attributes.folder_name)?("file="+c.editNode.attributes.folder_name+"."+g):("file="+a);
            c.editNode.id=g;
            Editor.handleEditorChange()
        })
    }
});
Dbl.SQLDelimiterPanel=function(){
    var a=[{
        fieldLabel:"SQL statement delimiter",
        name:"sqldelimiter",
        id:"sqldelimiter",
        allowBlank:false,
        xtype:"textfield",
        value:Editor.defaultSQLDelimiter
    }];
    var b=[{
        text:"Set",
        handler:this.getDelimiter,
        scope:this
    },{
        text:"Cancel",
        handler:this.cancelSetDelimiter,
        scope:this
    }];
    Dbl.SQLDelimiterPanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"set_delimiter_form",
        frame:true,
        border:false,
        labelWidth:150,
        defaults:{
            width:150
        },
        items:a,
        buttons:b
    })
};
    
Ext.extend(Dbl.SQLDelimiterPanel,Ext.form.FormPanel,{
    getDelimiter:function(){
        var a=Ext.getCmp("set_delimiter_form").getForm().getFieldValues();
        if(a.sqldelimiter){
            Editor.defaultSQLDelimiter=a.sqldelimiter;
            Dbl.UserActivity.editorsPanel.delimiterChanged(a.sqldelimiter);
            this.cancelSetDelimiter()
        }
    },
    cancelSetDelimiter:function(){
        Ext.getCmp("sql_dlimiter_window").close()
    }
});
Dbl.TableDataPanel=function(l,d){
    this.keys=[];
    this.fields=[];
    this.models=[];
    this.keyValues=[];
    this.editedFields=[];
    this.editedFieldValues=[];
    this.newTableRow=false;
    this.shorts=[];
    this.paginator="";
    this.previousEditedRowIndex=-1;
    this.currentEditingRowIndex=-1;
    for(var f=0;f<d.length;f++){
        var j=d[f];
        this.fields.push(j.name);
        var k={};
        
        k.header=j.name;
        k.sortable=true;
        k.dataIndex=j.name;
        k.ctype=j.ctype;
        k.field_type=j.type;
        k.has_default=j.has_default;
        k.default_value=j.default_value;
        k.is_binary=j.binary;
        k.multi_set=j.multi_set;
        this.models.push(k);
        if(j.primary_key||j.unique_key){
            this.keys.push(j.name)
        }
        if(j.auto_increment){
            this.auto_increment_field=j.name
        }
    }
    if(this.keys.length==0){
        this.keys=this.fields
    }
    var e=new Ext.data.SimpleStore({
        url:MAIN_URL+"/cmd.php?command=get_table_data&form=1",
        pruneModifiedRecords:true,
        baseParams:{
            table:l,
            connection_id:Server.connection_id
        },
        root:"results",
        remoteSort:true,
        totalProperty:"total",
        fields:this.fields,
        listeners:{}
    });
    e.on("load",function(m,c,n){
        this.autoSizeColumns();
        var p=this.getColumnModel();
        for(var o=1;o<h.getColumnCount();o++){
            var q=h.columns[o];
            if(q.is_binary&&(q.field_type!="binary"&&q.field_type!="varbinary")){
                q.renderer=this.setTableFields
            }else{
                q.renderer=this.setDefaultNullFields
            }
        }
    },this);
    e.load({
        params:{
            start:0,
            limit:50
        },
        callback:function(){
            Dbl.Utils.removeLoadingIcon()
        }
    });
    var a=new Ext.grid.CheckboxSelectionModel({
        header:"",
        checkOnly:true,
        init:function(c){
            this.grid=c;
            this.initEvents()
        },
        listeners:{
            selectionchange:function(c){
                if(c.getCount()){
                    Ext.getCmp("delete_row").enable()
                }else{
                    Ext.getCmp("delete_row").disable()
                }
            },
            scope:this
        }
    });
    var b=new Array(a);
    var b=b.concat(this.models);
    var h=new Ext.grid.ColumnModel({
        columns:b
    });
    if(Dbl.UserActivity.getValue("table_type")=="table"){
        for(var f=1;f<h.getColumnCount();f++){
            var g=h.columns[f];
            if(!g.is_binary||(g.field_type=="binary"||g.field_type=="varbinary")){
                g.editor=this.attachCellEditor(g)
            }
        }
    }
    Dbl.TableDataPanel.superclass.constructor.call(this,{
        id:"table_data_grid",
        store:e,
        cm:h,
        sm:a,
        columnLines:true,
        viewConfig:{},
        clicksToEdit:2,
        border:false,
        trackMouseOver:true,
        tbar:this.buildTopToolbar(),
        scroable:true,
        bbar:this.buildBottomPaginator(e),
        listeners:{
            rowclick:this.handleRowClick,
            beforeedit:this.handleBeforeEdit,
            afteredit:this.handleAfterEdit,
            celldblclick:this.showContent,
            sortchange:function(c,m){},
            scope:this
        }
    });
    if(Dbl.UserActivity.getValue("table_type")=="table"){
        this.addListener("cellcontextmenu",this.onCellContextMenu)
    }
};

Ext.extend(Dbl.TableDataPanel,Ext.grid.EditorGridPanel,{
    resetEditParams:function(){
        this.newTableRow=false;
        this.keyValues=[];
        this.editedFields=[];
        this.editedFieldValues=[];
        this.previousEditedRowIndex=-1;
        this.currentEditingRowIndex=-1
    },
    autoSizeColumns:function(){
        var a=new Array();
        this.colModel.suspendEvents();
        for(var b=1;b<this.colModel.getColumnCount();b++){
            var c=this.models[b-1].ctype;
            if(c=="C"||c=="X"){
                this.colModel.setRenderer(b,Ext.util.Format.htmlEncode)
            }
            if(c=="X"){
                this.shorts[b]=true;
                this.autoSizeColumn(b,300)
            }else{
                this.autoSizeColumn(b)
            }
        }
        this.colModel.resumeEvents();
        this.view.refresh(true)
    },
    setTableFields:function(e,b,a,f,d,c){
        e=(Ext.util.Format.trim(e)=="(NULL)")?e:"(BLOB)";
        b.css=(e=="(NULL)")?"non_editing_cell set_as_default_or_null":"non_editing_cell";
        return e
    },
    setDefaultNullFields:function(e,b,a,f,d,c){
        b.css=(e=="(NULL)"||e=="(DEFAULT)")?"set_as_default_or_null":"";
        return e
    },
    attachCellEditor:function(b){
        var a="";
        switch(b.field_type){
            case"set":case"enum":
                a=Dbl.Utils.getComboBoxEditor(b.header,b.multi_set);
                break;
            default:
                a=new Ext.form.TextField()
        }
        return a
    },
    autoSizeColumn:function(f,a){
        var d=this.view.getHeaderCell(f).firstChild.scrollWidth;
        for(var e=0;e<this.store.getCount();e++){
            var b=this.view.getCell(e,f).firstChild.scrollWidth;
            d=Math.max(d,b);
            if(a&&d>a){
                d=a
            }
        }
        if(!d){
            return
        }
        this.colModel.setColumnWidth(f,d+2);
        return d
    },
    showContent:function(a,k,g,b){
        if(this.autorefresh_lap){
            return false
        }
        var f=a.getStore().getAt(k);
        var l=a.getColumnModel().getDataIndex(g);
        var e=f.get(l);
        var h=a.getColumnModel().columns[g];
        if(h.is_binary&&(h.field_type!="binary"&&h.field_type!="varbinary")){
            return
        }
        if(Ext.util.Format.trim(e)=="(NULL)"){
            f.set(l,"")
        }
        if(!this.shorts[g]){
            return
        }
        var c={
            row:k,
            record:f
        };
    
        this.getFieldKeyValues(c);
        var j=[{
            text:"update",
            scope:this,
            handler:function(){
                this.editedFields.push(l);
                if(Ext.getCmp("long_text").disabled){
                    f.set(l,"(NULL)");
                    this.editedFieldValues.push("(NULL)")
                }else{
                    var m=Ext.getCmp("long_text_edit_form").getForm();
                    f.set(l,m.getValues().long_text);
                    this.editedFieldValues.push(m.getValues().long_text)
                }
                Ext.getCmp("text_edit_window").close();
                var n=this.getTopToolbar();
                n.get(0).enable();
                n.get(9).show();
                n.get(10).show()
            }
        },{
            text:"cancel",
            handler:function(){
                Ext.getCmp("text_edit_window").close();
                f.set(l,Ext.util.Format.htmlEncode(e))
            }
        }];
        var d={
            title:"",
            id:"text_edit_window",
            width:300,
            height:370,
            resizable:true,
            autoScroll:true,
            layout:"fit",
            modal:true,
            plain:true,
            stateful:true,
            items:[new LongTextEditPanel(Ext.util.Format.htmlEncode(e))],
            buttons:(Dbl.UserActivity.getValue("table_type")=="table")?j:[]
        };
    
        this.win=new Ext.Window(d);
        this.win.show();
        return false
    },
    handleRowClick:function(a,c,b){
        if((this.currentEditingRowIndex!=-1)&&(c!=this.currentEditingRowIndex)){
            if(this.editedFields.length>0){
                this.updateTableRow()
            }
        }
    },
    handleBeforeEdit:function(c){
        if(this.autorefresh_lap){
            return false
        }
        var a=c.record;
        var b=c.field;
        if(Ext.util.Format.trim(a.get(b))=="(NULL)"){
            a.set(b,"")
        }
        this.getFieldKeyValues(c)
    },
    getFieldKeyValues:function(c){
        this.currentEditingRowIndex=c.row;
        if(this.previousEditedRowIndex==-1){
            this.previousEditedRowIndex=this.currentEditingRowIndex
        }
        if(this.previousEditedRowIndex!=this.currentEditingRowIndex){
            if(this.editedFields.length>0){
                this.updateTableRow()
            }else{
                this.previousEditedRowIndex=this.currentEditingRowIndex;
                this.keyValues=[]
            }
        }
        if(!this.keyValues.length){
            for(var b=0;b<this.keys.length;b++){
                var a=this.keys[b];
                this.keyValues.push(c.record.data[a])
            }
        }
    },
    handleAfterEdit:function(b){
        if(b.record.newRow){
            this.newTableRow=b.record.data
        }
        if(b.value==b.originalValue){
            return
        }else{
            if(this.editedFields.indexOf(b.field)==-1){
                this.editedFields.push(b.field);
                this.editedFieldValues.push(b.value)
            }
            var a=this.getTopToolbar();
            a.get(0).enable();
            a.get(9).show();
            a.get(10).show()
        }
    },
    insertBackTicks:function(c){
        if(!Ext.isArray(c)){
            return"`"+c+"`"
        }
        var b=new Array();
        for(var a=0;a<c.length;a++){
            b.push("`"+c[a]+"`")
        }
        return b
    },
    insertQuotes:function(c){
        var a=new Array();
        if(Ext.isArray(c)){
            for(var b=0;b<c.length;b++){
                a.push("'"+this.addslashes(c[b])+"'")
            }
        }else{
            return"'"+this.addslashes(c)+"'"
        }
        return a
    },
    addslashes:function(a){
        a=a.replace(/\\/g,"\\\\");
        a=a.replace(/\'/g,"\\'");
        a=a.replace(/\"/g,'\\"');
        a=a.replace(/\0/g,"\\0");
        return a
    },
    generateInsertSql:function(){
        var a=this.getColumnModel();
        var c=a.columns;
        var h=Dbl.UserActivity.getValue("table");
        var m=Dbl.UserActivity.getValue("database");
        var g=this.newTableRow;
        var o="INSERT INTO "+this.insertBackTicks(m)+"."+this.insertBackTicks(h);
        var n=new Array();
        var k=new Array();
        for(var f=1;f<c.length;f++){
            n.push(this.insertBackTicks(c[f].header));
            var l=(g[c[f].header]=="undefined")?"":g[c[f].header];
            if(l=="(NULL)"||!l){
                var b=(c[f].has_default&&c[f].default_value)?c[f].default_value:null;
                k.push(b)
            }else{
                if(c[f].field_type=="bit"){
                    k.push("b"+l)
                }else{
                    if((c[f].ctype=="I"||c[f].ctype=="N")&&c[f].field_type!="SET"){
                        k.push(l)
                    }else{
                        l=(l=="CURRENT_TIMESTAMP")?l:l;
                        k.push(l)
                    }
                }
            }
        }
        n=n.join(", ");
        var e=[];
        for(var d=0;d<k.length;d++){
            e.push("?")
        }
        o=o+" ("+n+") VALUES ("+e.join(", ")+")";
        return[o,k]
    },
    generateUpdateSql:function(){
        var b=this.getColumnModel();
        var f=b.columns;
        var g=this.insertBackTicks(this.keys);
        var n=this.insertQuotes(this.keyValues);
        var l=Dbl.UserActivity.getValue("table");
        var d=this.editedFields;
        var k=this.editedFieldValues;
        var m=Dbl.UserActivity.getValue("database");
        var a=this.getQueryDataString(f,d,k);
        var o=this.generateKeyValuePairsData(g,n);
        var j=new Array();
        for(var h=0;h<o.length;h++){
            j[h]=o[h].key+" = "+o[h].value
        }
        var c="UPDATE "+this.insertBackTicks(m)+"."+this.insertBackTicks(l)+" SET "+a[0].join(", ")+" WHERE "+j.join(" AND ");
        var e=a[1];
        return[c,e]
    },
    generateKeyValuePairsData:function(c,a){
        var e=new Array();
        for(var b=0;b<c.length;b++){
            var d=a[b];
            if(d=="'(NULL)'"){
                continue
            }
            e.push({
                key:c[b],
                value:d
            })
        }
        return e
    },
    getQueryDataString:function(c,a,g){
        var f=new Array();
        var h=[];
        for(var e=1;e<c.length;e++){
            var j="";
            var b=c[e].header;
            var d=a.indexOf(b);
            if(d==-1){
                continue
            }
            var j=g[d];
            j=(j=="(NULL)")?"NULL":j;
            if(j=="(DEFAULT)"){
                j=(c[e].has_default&&c[e].default_value)?c[e].default_value:null
            }
            if(j!="NULL"){
                if(c[e].field_type=="bit"){
                    j="b"+this.insertQuotes(j)
                }else{
                    if((c[e].ctype=="I"||c[e].ctype=="N")&&c[e].field_type!="SET"){
                        j=j
                    }else{
                        j=j
                    }
                }
            }
            f.push(this.insertBackTicks(b)+" = ?");
            h.push(j)
        }
        return[f,h]
    },
    updateTableRow:function(){
        if(!Dbl.UserActivity.getValue("table")){
            Dbl.Utils.showErrorMsg("Could not be saved!","");
            return false
        }
        var b="";
        var a="";
        if(this.newTableRow){
            b=this.generateInsertSql();
            a=true
        }else{
            b=this.generateUpdateSql();
            a=false
        }
        var c="`"+Dbl.UserActivity.getValue("database")+"`.`"+Dbl.UserActivity.getValue("table")+"`";
        var d={
            connection_id:Server.connection_id,
            sql:b[0],
            data:b[1],
            insert_or_update:a,
            table:c,
            tableKeys:Ext.encode(this.keys),
            keyValues:Ext.encode(this.keyValues),
            scope:this
        };
    
        Server.sendCommand("update_table_data",d,function(g){
            if(g.inserted&&g.autoIncrValue){
                var h=this.auto_increment_field;
                var e=this.store.getAt(this.previousEditedRowIndex);
                if(h){
                    e.set(h,g.autoIncrValue)
                }
            }
            this.store.commitChanges();
            this.resetEditParams();
            if(g.success){
                var f=this.getTopToolbar();
                f.get(0).disable();
                f.get(9).hide();
                f.get(10).hide();
                this.autoSizeColumns()
            }
            if(!g.success){
                Dbl.Utils.showErrorMsg(g.msg)
            }
        },function(f){
            var e=f.msg?f.msg:f;
            Dbl.Utils.showErrorMsg(e)
        })
    },
    buildTopToolbar:function(){
        var b=Dbl.UserActivity.getValue("table_type");
        var a=this.getRefreshButtonGroup();
        var f={
            xtype:"buttongroup",
            disabled:true,
            items:[{
                text:"Save",
                tooltip:"Save changes",
                iconCls:"update_table_data",
                width:60,
                handler:this.saveTableRow,
                scope:this,
            },{
                text:"Cancel",
                tooltip:"Cancel changes",
                iconCls:"cancel_table_update",
                width:60,
                handler:this.cancelTableModifications,
                scope:this,
            }]
        };
        
        var d={
            xtype:"buttongroup",
            items:[{
                text:"Add",
                tooltip:"Add new row",
                iconCls:"add",
                width:60,
                handler:this.addTableRow,
                scope:this,
            },{
                text:"Delete",
                id:"delete_row",
                tooltip:"Delete selected row(s)",
                iconCls:"remove",
                disabled:true,
                width:60,
                handler:this.deleteConfirmation,
                scope:this,
            }]
        };
        
        var e={
            xtype:"buttongroup",
            items:[{
                text:"Export",
                id:"export_table_data",
                iconCls:"copy_table",
                width:60,
                handler:this.exportTableData,
                scope:this
            }]
        };
        
        if(b=="view"){
            return a
        }else{
            var c=[f,"-",d,"-",e,"-",];
            var g={
                xtype:"buttongroup",
                height:30,
                hidden:true,
                items:[{
                    xtype:"tbtext",
                    cls:"save_modification_alert",
                    text:"Data modified but not saved",
                }]
            };
            
            c=c.concat(a);
            c.push({
                xtype:"tbseparator",
                hidden:true,
            });
            c.push(g);
            return c
        }
    },
    buildBottomPaginator:function(a){
        this.paginator=new Ext.PagingToolbar({
            id:"table_data_paginator",
            pageSize:50,
            store:a,
            displayInfo:true,
            displayMsg:"Displaying {0} - {1} of {2}",
            emptyMsg:"No data to display",
            width:"100%",
            style:{
                borderWidth:"0px"
            }
        });
        var b=new Ext.Toolbar({
            items:[this.paginator]
        });
        return b
    },
    addTableRow:function(){
        var g=this.getStore().getCount();
        var a=this.getStore().recordType;
        var e={};
    
        var j=this.getColumnModel();
        for(var f=1;f<j.columns.length;f++){
            var c=j.columns[f];
            var h=c.header;
            var d="(NULL)";
            if(c.field_type=="set"||c.field_type=="enum"||c.field_type=="timestamp"){
                d=(c.has_default&&c.default_value)?c.default_value:d
            }
            e[h]=d
        }
        var b=new a(e);
        b.newRow=true;
        this.stopEditing();
        this.store.insert(g,b);
        this.startEditing(g,1)
    },
    saveTableRow:function(){
        this.updateTableRow()
    },
    deleteConfirmation:function(){
        var a=this.getSelectionModel().getSelections();
        if(a.length>0){
            Ext.Msg.show({
                title:"Confirmation",
                msg:Messages.getMsg("delete_rows"),
                buttons:Ext.Msg.YESNO,
                fn:this.deleteSelectedRows.createDelegate(this),
                animEl:"delete_row",
                icon:Ext.MessageBox.QUESTION
            })
        }
    },
    generateDeleteSql:function(e,b){
        var a=this.getColumnModel();
        var c=this.getQueryDataString(a.columns,e,b);
        var d="DELETE FROM "+this.insertBackTicks(Dbl.UserActivity.getValue("database"))+"."+this.insertBackTicks(Dbl.UserActivity.getValue("table"))+" WHERE "+c.join(" AND ");
        return d
    },
    generateSelectSql:function(e,b){
        var a=this.getColumnModel();
        var c=this.getQueryDataString(a.columns,e,b);
        var d="SELECT count(*) FROM "+this.insertBackTicks(Dbl.UserActivity.getValue("database"))+"."+this.insertBackTicks(Dbl.UserActivity.getValue("table"))+" WHERE "+c.join(" AND ");
        return d
    },
    deleteSelectedRows:function(d){
        if(d=="yes"){
            var f=this.getSelectedRows();
            var e=Ext.decode(f);
            if(!e.length){
                this.deleteRows();
                return
            }
            var g=[];
            for(var c=0;c<e.length;c++){
                var h=e[c];
                var a=this.generateSelectSql(h.keys,h.values);
                var b=this.generateDeleteSql(h.keys,h.values);
                g.push({
                    selectsql:a,
                    deletesql:b
                })
            }
            Server.sendCommand("delete_table_row",{
                connection_id:Server.connection_id,
                table:Dbl.UserActivity.getValue("table"),
                database:Dbl.UserActivity.getValue("database"),
                queries:g,
                scope:this
            },function(j){
                if(j.success){
                    this.deleteRows();
                    this.refreshCurrentPage()
                }else{
                    if(!j.success){
                        Dbl.Utils.showErrorMsg(j.msg,"")
                    }
                }
            },function(k){
                var j=k.msg?k.msg:k;
                Dbl.Utils.showErrorMsg(j,"")
            })
        }
    },
    deleteRows:function(){
        var d=this.getSelectionModel().getSelections();
        var a=this.getStore();
        for(var b=0;b<d.length;b++){
            var e=d[b];
            a.remove(e)
        }
        this.resetEditParams();
        var c=this.getTopToolbar();
        c.get(0).disable();
        c.get(9).hide();
        c.get(10).hide()
    },
    cancelTableModifications:function(){
        this.store.rejectChanges();
        this.resetEditParams();
        var a=this.getTopToolbar();
        a.get(0).disable();
        a.get(9).hide();
        a.get(10).hide()
    },
    refreshCurrentPage:function(){
        this.paginator.doRefresh();
        if(Dbl.UserActivity.getValue("table_type")=="table"){
            var a=this.getTopToolbar();
            a.get(0).disable();
            a.get(9).hide();
            a.get(10).hide()
        }
        if(this.autorefresh_lap){
            Dbl.Utils.startTaskRunner(this.autorefresh_lap,"","","","TABLEDATA")
        }
    },
    getSelectedRows:function(){
        var n=this.getSelectionModel().getSelections();
        var e=[];
        for(var g=0;g<n.length;g++){
            if(n[g].newRow){
                continue
            }
            var b=[];
            var h=[];
            if(this.keys.length){
                for(var f=0;f<this.keys.length;f++){
                    var l=this.keys[f];
                    var d=n[g].get(l);
                    b[f]=l;
                    h[f]=d
                }
            }else{
                for(var c=0;c<this.fields.length;c++){
                    var k=this.fields[c];
                    var a=n[g].get(k);
                    b[f]=k;
                    h[f]=a
                }
            }
            e.push({
                keys:b,
                values:h
            })
        }
        return Ext.encode(e)
    },
    updateDataStore:function(d){
        var b=this.getStore();
        var g=b.getModifiedRecords();
        var j=g[g.length-1];
        var c=j.id;
        var f=b.indexOfId(c);
        var a=b.recordType;
        if(d.inserted){
            var e=Ext.decode(d.row)
        }else{
            var e=j.data
        }
        b.removeAt(f);
        var h=new a(e);
        b.insert(f,h)
    },
    onCellContextMenu:function(c,h,b,g){
        var a=c.getColumnModel().columns[b];
        if(a.is_binary&&(a.field_type!="binary"&&a.field_type!="varbinary")){
            return
        }
        g.stopEvent();
        if(this.menu){
            this.menu.removeAll()
        }
        var d="grid_cell_context";
        var f=[this.InsertRow(c),this.DeleteRow(c,h),"-",this.SetEmptyString(c,h,b),this.SetNull(c,h,b),this.SetDefault(c,h,b),"-",this.SaveChanges(c),this.CancelUpdation(c)];
        this.menu=new Ext.menu.Menu({
            id:d,
            items:f,
            defaults:{
                scale:"small",
                width:"100%",
                iconAlign:"left"
            }
        });
        this.menu.showAt(g.getXY())
    },
    InsertRow:function(a){
        return{
            itemId:"insert_row_context",
            text:"Insert New Row",
            iconCls:"add",
            disabled:a.autorefresh_lap?true:false,
            listeners:{
                click:function(){
                    a.addTableRow()
                }
            }
        }
    },
    DeleteRow:function(a,b){
        return{
            itemId:"delete_row_context",
            text:"Delete Row",
            iconCls:"remove",
            disabled:a.autorefresh_lap?true:false,
            listeners:{
                click:function(){
                    a.getSelectionModel().selectRow(b);
                    a.deleteConfirmation()
                }
            }
        }
    },
    SaveChanges:function(b){
        var c=Ext.getCmp("table_data_grid").getTopToolbar();
        var a=c.get(0).disabled;
        return{
            itemId:"save_changes_context",
            text:"Save Changes",
            iconCls:"update_table_data",
            disabled:(b.autorefresh_lap||a)?true:false,
            listeners:{
                click:function(){
                    b.saveTableRow()
                }
            }
        }
    },
    CancelUpdation:function(b){
        var c=Ext.getCmp("table_data_grid").getTopToolbar();
        var a=c.get(0).disabled;
        return{
            itemId:"revert_row_context",
            text:"Cancel Changes",
            iconCls:"cancel_table_update",
            disabled:(b.autorefresh_lap||a)?true:false,
            listeners:{
                click:function(){
                    b.cancelTableModifications()
                }
            }
        }
    },
    SetEmptyString:function(b,c,a){
        return{
            itemId:"set_empty_"+a,
            text:"Set To Empty String",
            iconCls:"empty_cell",
            disabled:b.autorefresh_lap?true:false,
            listeners:{
                click:function(f,d){
                    b.changeCellData("",b,c,a)
                }
            }
        }
    },
    SetNull:function(b,c,a){
        return{
            itemId:"set_null_"+a,
            text:"Set To NULL",
            iconCls:"null_cell",
            disabled:b.autorefresh_lap?true:false,
            listeners:{
                click:function(f,d){
                    b.changeCellData("(NULL)",b,c,a)
                }
            }
        }
    },
    SetDefault:function(b,c,a){
        return{
            itemId:"set_default_"+a,
            text:"Set To Default",
            iconCls:"default_value_cell",
            disabled:b.autorefresh_lap?true:false,
            listeners:{
                click:function(f,d){
                    b.changeCellData("(DEFAULT)",b,c,a)
                }
            }
        }
    },
    changeCellData:function(e,c,h,b){
        var a=c.getStore().getAt(h);
        var g=c.getColumnModel().getDataIndex(b);
        a.set(g,e);
        var f={
            row:h,
            record:a
        };
    
        this.getFieldKeyValues(f);
        this.editedFields.push(g);
        var e=(e=="")?"''":e;
        this.editedFieldValues.push(e);
        var d=this.getTopToolbar();
        d.get(0).enable();
        d.get(9).show();
        d.get(10).show()
    },
    exportTableData:function(){
        Database.sendCommand("get_table_columns",{
            tablename:Dbl.UserActivity.getValue("table"),
            dbname:Dbl.UserActivity.getValue("database")
        },function(a){
            a.curr_table=Dbl.UserActivity.getValue("table");
            a.curr_db=Dbl.UserActivity.getValue("database");
            this.win=new Dbl.ContextMenuWindow({
                title:"Export Table",
                id:"export_table",
                width:560,
                height:240,
                onEsc:function(){},
                items:[new Dbl.ExportTableDbPanel(a)]
            });
            this.win.show()
        },function(b){
            var a=b.msg?b.msg:b;
            Dbl.Utils.showErrorMsg(a,"")
        })
    },
    getRefreshButtonGroup:function(){
        var b={
            text:"Refresh",
            tooltip:"Refresh",
            iconCls:"table_data_refresh",
            iconAlign:"left",
            disabled:false,
            width:60,
            handler:this.refreshCurrentPage,
            scope:this
        };
    
        var c={
            text:"Auto Refresh",
            tooltip:"Auto Refresh",
            iconCls:"table_data_refresh",
            iconAlign:"left",
            menu:{
                xtype:"menu",
                plain:true,
                items:[{
                    xtype:"form",
                    labelWidth:75,
                    frame:true,
                    header:false,
                    border:false,
                    width:200,
                    defaults:{
                        width:98
                    },
                    defaultType:"textfield",
                    items:[{
                        fieldLabel:"Interval(sec)",
                        name:"second",
                        minValue:1,
                        maxValue:86400,
                        value:10
                    }],
                    buttons:[{
                        text:"Start",
                        tooltip:"Start auto refresh",
                        width:60,
                        handler:function(){
                            var g=Ext.getCmp("table_data_grid").getTopToolbar();
                            if(Dbl.UserActivity.getValue("table_type")=="table"){
                                g.get(0).disable();
                                g.get(2).disable();
                                g.get(4).disable();
                                g.get(9).hide();
                                g.get(10).hide()
                            }
                            var e=g.items.get("tabledata_refresh_btns");
                            var f=e.items.get(1).menu.items.get(0);
                            var d=f.getForm().getFieldValues();
                            if(d.second<1||d.second>86400){
                                return false
                            }
                            e.get(1).menu.hide();
                            e.disable();
                            e.nextSibling().show();
                            e.nextSibling().nextSibling().show();
                            Ext.getCmp("table_data_grid").autorefresh_lap=d.second;
                            Dbl.Utils.startTaskRunner(d.second,"","","","TABLEDATA")
                        }
                    },{
                        text:"Cancel",
                        tooltip:"Cancel auto refresh",
                        width:60,
                        handler:function(){
                            var e=Ext.getCmp("table_data_grid").getTopToolbar();
                            var d=e.items.get("tabledata_refresh_btns");
                            d.get(1).menu.hide()
                        }
                    }]
                }]
            }
        };

        var a={
            text:"Stop",
            tooltip:"Stop auto refresh",
            iconCls:"stop_auto_refresh",
            handler:function(){
                Ext.getCmp("table_data_grid").autorefresh_lap=null;
                var e=Ext.getCmp("table_data_grid").getTopToolbar();
                if(Dbl.UserActivity.getValue("table_type")=="table"){
                    e.get(2).enable();
                    e.get(4).enable()
                }
                var d=e.get("tabledata_refresh_btns");
                d.enable();
                d.nextSibling().hide();
                d.nextSibling().nextSibling().hide();
                Dbl.Utils.stopTaskRunner(this.updatetask,this.updaterunner,this.delayedtask)
            }
        };

        return[{
            xtype:"buttongroup",
            id:"tabledata_refresh_btns",
            disabled:false,
            items:[b,c]
        },{
            xtype:"tbseparator",
            hidden:true,
        },{
            xtype:"buttongroup",
            hidden:true,
            items:[{
                iconAlign:"left",
                text:"Refreshing automatically",
                width:200
            },a]
        }]
    }
});
Dbl.TableDDLPanel=function(b){
    var a=this.getDDLPanel(b);
    Dbl.TableDDLPanel.superclass.constructor.call(this,{
        id:"table_ddl_panel",
        layout:"fit",
        split:true,
        border:false,
        header:false,
        tbar:this.buildTopToolbar(),
        items:[a],
        listeners:{
            afterlayout:function(){
                Dbl.Utils.removeLoadingIcon()
            }
        }
    })
};

Ext.extend(Dbl.TableDDLPanel,Ext.Panel,{
    buildTopToolbar:function(){
        var b={
            xtype:"tbbutton",
            text:"Refresh",
            id:"refresh_ddl_btn",
            tooltip:"Refresh",
            iconCls:"refresh_ddl_btn",
            width:75,
            ref:"../refreshDDLBtn",
            handler:this.refreshDDL,
            scope:this
        };
        
        var c={
            text:"Auto Refresh",
            tooltip:"Auto Refresh",
            iconCls:"refresh_ddl_btn",
            width:75,
            menu:{
                xtype:"menu",
                plain:true,
                items:[{
                    xtype:"form",
                    labelWidth:75,
                    frame:true,
                    header:false,
                    border:false,
                    width:200,
                    defaults:{
                        width:98
                    },
                    defaultType:"textfield",
                    items:[{
                        fieldLabel:"Interval(sec)",
                        name:"second",
                        minValue:1,
                        maxValue:86400,
                        value:10
                    }],
                    buttons:[{
                        text:"Start",
                        tooltip:"Start auto refresh",
                        width:75,
                        handler:function(){
                            var f=Dbl.Utils.getAutoRefreshToolbar();
                            var e=f.items.get(0).items.get(1).menu.items.get(0);
                            var d=e.getForm().getFieldValues();
                            if(d.second<1||d.second>86400){
                                return false
                            }
                            f.items.get(0).items.get(1).menu.hide();
                            f.items.get(0).disable();
                            f.items.get(1).show();
                            f.items.get(2).show();
                            Ext.getCmp("table_ddl_panel").autorefresh_lap=d.second;
                            Dbl.Utils.startTaskRunner(d.second,"","","","TABLEDDL")
                        }
                    },{
                        text:"Cancel",
                        tooltip:"Cancel auto refresh",
                        width:75,
                        handler:function(){
                            var d=Dbl.Utils.getAutoRefreshToolbar();
                            d.items.get(0).items.get(1).menu.hide()
                        }
                    }]
                }]
            }
        };

        var a={
            text:"Stop",
            tooltip:"Stop auto refresh",
            iconCls:"stop_auto_refresh",
            handler:function(){
                Ext.getCmp("table_ddl_panel").autorefresh_lap=null;
                var d=Dbl.Utils.getAutoRefreshToolbar();
                d.items.get(0).enable();
                d.items.get(1).hide();
                d.items.get(2).hide();
                Dbl.Utils.stopTaskRunner(this.updatetask,this.updaterunner,this.delayedtask)
            }
        };

        return[{
            xtype:"buttongroup",
            disabled:false,
            items:[b,c]
        },{
            xtype:"tbseparator",
            hidden:true,
        },{
            xtype:"buttongroup",
            hidden:true,
            items:[{
                iconAlign:"left",
                text:"Refreshing automatically",
                width:200
            },a]
        }]
    },
    refreshDDL:function(){
        Database.sendCommand("get_table_ddl",{
            table:Dbl.UserActivity.getValue("table"),
            database:Dbl.UserActivity.getValue("database"),
            scope:this
        },function(b){
            this.removeAll();
            var a=this.getDDLPanel(b.result[0][1]);
            this.add(a);
            this.doLayout();
            if(this.autorefresh_lap){
                Dbl.Utils.startTaskRunner(this.autorefresh_lap,"","","","TABLEDDL")
            }
        })
    },
    getDDLPanel:function(a){
        return{
            xtype:"uxCodeMirrorPanel",
            parser:"sql",
            padding:"5",
            border:false,
            autoScroll:true,
            sourceCode:a,
            codeMirror:{
                height:"100%",
                width:"100%",
                lineNumbers:false,
                readOnly:true
            }
        }
    }
});
Dbl.TableInformationPanel=function(a){
    Dbl.TableInformationPanel.superclass.constructor.call(this,{
        id:"table_information_panel",
        layout:"fit",
        split:true,
        border:false,
        header:false,
        tbar:this.buildTopToolbar(),
        items:[a]
    })
};
    
Ext.extend(Dbl.TableInformationPanel,Ext.Panel,{
    buildTopToolbar:function(){
        return[{
            text:"Refresh",
            id:"refresh_info_btn",
            tooltip:"Refresh",
            iconCls:"refresh_info_btn",
            width:75,
            ref:"../refreshInfoBtn",
            handler:this.refreshInfo,
            scope:this
        }]
    },
    refreshInfo:function(){
        Database.sendCommand("get_table_status",{
            table:Dbl.UserActivity.getValue("table"),
            database:Dbl.UserActivity.getValue("database"),
            asView:true,
            scope:this
        },function(a){
            this.removeAll();
            this.add(a.panel);
            this.doLayout()
        })
    }
});
var TableNamePanel=function(c){
    var b=[{
        fieldLabel:"Enter table name",
        name:"tablename",
        emptyText:"NewTable",
        allowBlank:false,
    }];
    var d=[{
        text:"Create",
        id:"get_tablename_btn",
        handler:this.getName.createCallback(c)
    },{
        text:"Cancel",
        handler:this.closeWindow
    }];
    var a=this;
    TableNamePanel.superclass.constructor.call(this,{
        bodyStyle:"padding: 5px 5px 0",
        id:"get_table_name_form",
        frame:true,
        labelWidth:100,
        defaultType:"textfield",
        items:b,
        buttons:d,
        defaults:{
            width:150,
            listeners:{
                specialkey:function(g,f){
                    if(f.getKey()==f.ENTER){
                        a.getName(c)
                    }
                }
            }
        },
    })
};

Ext.extend(TableNamePanel,Ext.FormPanel,{
    closeWindow:function(){
        Ext.getCmp("get_table_name_window").close()
    },
    getName:function(b){
        var a=Ext.getCmp("get_table_name_form").getForm().getFieldValues();
        if(a.tablename){
            b.createTable(a.tablename)
        }
    }
});
Dbl.TableStructurePanel=function(){
    Dbl.TableStructurePanel.superclass.constructor.call(this,{
        activeItem:Dbl.UserActivity.getValue("activeTableTab"),
        cls:"dbl-subtab",
        resizeTabs:true,
        border:false,
        minTabWidth:125,
        tabPosition:"top",
        enableTabScroll:true,
        items:[{
            id:"table_data",
            title:(Dbl.UserActivity.getValue("table_type")=="view")?"View data":"Table data",
            layout:"fit",
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"column_info",
            title:"Columns",
            layout:"fit",
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"index_info",
            title:"Indexes",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"table_ddl",
            title:"DDL",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        },{
            id:"table_information",
            title:"Information",
            layout:"fit",
            autoScroll:true,
            listeners:{
                activate:this.activate1,
                scope:this
            },
            items:[]
        }]
    })
};
    
Ext.extend(Dbl.TableStructurePanel,Ext.TabPanel,{
    lastTabId:"column_info",
    activate1:function(){
        var a=this.getActiveTab();
        var b=a.id;
        Dbl.UserActivity.dataPanel.tableTabChanged(b);
        Dbl.Utils.addLoadingIcon();
        if(!Server.connection_id){
            this.showMsgPanel(Messages.getMsg("noconnection_selected"));
            Dbl.Utils.removeLoadingIcon()
        }else{
            if(!Dbl.UserActivity.getValue("table")){
                this.showMsgPanel(Messages.getMsg("notable_selected"));
                Dbl.Utils.removeLoadingIcon()
            }else{
                if(b=="table_data"){
                    this.showPanel(a,"get_table_columns")
                }else{
                    if(b=="column_info"){
                        this.showPanel(a,"get_table_creation_info")
                    }else{
                        if(b=="index_info"){
                            this.showPanel(a,"get_min_table_indexes")
                        }else{
                            if(b=="table_ddl"){
                                this.showInfoPanel("get_table_ddl",false,true)
                            }else{
                                if(b=="table_information"){
                                    this.showInfoPanel("get_table_status",true,true)
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    showMsgPanel:function(b){
        var a=this.getActiveTab();
        a.removeAll();
        a.add({
            padding:"10px",
            border:false,
            html:b
        });
        a.doLayout()
    },
    showInfoPanel:function(d,e,c){
        var b=Dbl.UserActivity.getValue("database")+"."+Dbl.UserActivity.getValue("table");
        var a=this.getActiveTab();
        if(a.table==b){
            a.doLayout();
            Dbl.Utils.removeLoadingIcon();
            return
        }
        Database.sendCommand(d,{
            table:Dbl.UserActivity.getValue("table"),
            database:Dbl.UserActivity.getValue("database"),
            asView:e,
            refreshable:c
        },function(g){
            a.removeAll();
            a.table=b;
            this.lastTabId=a.id;
            var f=g.panel;
            if(a.id=="table_ddl"){
                f=new Dbl.TableDDLPanel(g.result[0][1])
            }
            a.add(f);
            a.doLayout()
        })
    },
    showPanel:function(b,c){
        var a="`"+Dbl.UserActivity.getValue("database")+"`.`"+Dbl.UserActivity.getValue("table")+"`";
        if(b.table==a){
            b.doLayout();
            Dbl.Utils.removeLoadingIcon();
            return
        }
        Server.sendCommand(c,{
            table:a,
            scope:this
        },function(f){
            var d="`"+Dbl.UserActivity.getValue("database")+"`.`"+Dbl.UserActivity.getValue("table")+"`";
            b.removeAll();
            var e="";
            if(b.id=="table_data"){
                e=new Dbl.TableDataPanel(d,f.columns)
            }else{
                if(b.id=="column_info"){
                    f.create_table=false;
                    f.alter_table=true;
                    e=new Dbl.CreateTablePanel(f)
                }else{
                    if(b.id=="index_info"){
                        e=new Dbl.ManageIndexPanel(f)
                    }else{
                        e=new Dbl.ListViewPanel({
                            data:f.data,
                            fields:f.fields,
                            models:f.models,
                            border:false
                        })
                    }
                }
            }
            b.table=d;
            this.lastTabId=b.id;
            b.add(e);
            b.doLayout()
        })
    }
});
var Topmenu={
    version:"0.98",
    menuPanel:"",
    tbar:"",
    userControls:"",
    about_data:'<h1>DBlite</h1><p>DBlite: A web based interface to MySQL</p><p>Version: 0.0.0.1</p><a href="http://dblite.com" target="_blank">www.dblite.com</a>',
    init:function(){
        Topmenu.userControls=new Ext.ButtonGroup({
            xtype:"buttongroup",
            id:"user_controls",
            frame:false,
            items:Topmenu.getGuestControls()
        });
        Topmenu.menuPanel=this.createMenuPanel();
        Topmenu.updateUserData()
    },
    createMenuPanel:function(){
        return new Ext.Panel({
            region:"north",
            layout:"fit",
            border:false,
            tbar:{
                id:"header_tbar",
                style:{
                    padding:"0px"
                },
                items:[
                //                {
                //                    xtype:"tbtext",
                //                    text:"",
                //                    cls:"dblite_logo"
                //                },"-",{
                //                    tooltip:"About DBLite",
                //                    iconCls:"about_dblite",
                //                    width:25,
                //                    handler:Topmenu.showAboutWindow
                //                    },{
                //                    tooltip:"Feedback",
                //                    iconCls:"dblite_feedback",
                //                    width:25,
                //                    disabled:Dblite.user?false:true,
                //                    handler:function(a){
                //                        window.open("http://groups.google.com/group/dblite","_newtab")
                //                        }
                //                    },
                {
                    xtype:"tbseparator"
                },{
                    tooltip:"Key mappings",
                    iconCls:"keyboard_shortcuts",
                    width:25,
                    handler:Topmenu.showKeyMappingsWindow
                },{
                    xtype:"tbseparator"
                },{
                    tooltip:"Execute query (F8)",
                    id:"topmenu_execute_btn",
                    iconCls:"execute_query",
                    handler:function(a){
                        Topmenu.disableExecuteButton();
                        Editor.handleExecuteQuery()
                    },
                    width:25
                },{
                    tooltip:"Save active editor (Ctrl+S)",
                    iconCls:"query_page_save",
                    handler:Editor.saveCurrentEditor.createDelegate(Editor,[false]),
                    width:25
                },{
                    tooltip:"Save active editor as...",
                    iconCls:"query_page_save_as",
                    handler:Editor.saveCurrentEditorAs.createDelegate(Editor,[false]),
                    width:25
                },{
                    tooltip:"Delete active editor",
                    iconCls:"query_page_delete",
                    handler:Editor.deleteEditorConfirmation,
                    width:25
                },{
                    id:"set_delimiter_btn",
                    tooltip:"Set delimiter for SQL execution (current value: "+Editor.defaultSQLDelimiter+")",
                    iconCls:"set_delimiter",
                    handler:Editor.showSQLDelimiterWindow,
                    width:25
                },"->",Topmenu.userControls]
            },
            items:[]
        })
    },
    updateUserData:function(a){
        if(Dblite.user){
            Topmenu.user=Dblite.user;
            Topmenu.changeUserControls(Dblite.user.user_name)
        }else{
            if(!Dblite.guest_user){
        //  Topmenu.showLoginWindow()
        }
        }
    },
    getGuestControls:function(){
        return[{
            id:"destroy_current_session",
            text:"Killing Session",
            tooltip:"Destroy guest user session...",
            iconCls:"destroy_session",
            width:25,
            handler:Topmenu.destroyCurrentSession,
            scope:this,
            hidden:(!Dblite.guest_user)?true:false
        },{
            id:"destroy_session_separator",
            xtype:"tbseparator",
            hidden:(!Dblite.guest_user)?true:false
        }
        //        ,{
        //        id:"dblite_register",
        //        text:"Register",
        //        tooltip:"User registration",
        //        iconCls:"register",
        //        width:25,
        //        handler:Topmenu.showRegisterWindow,
        //        scope:this
        //    }
        ,{
            xtype:"tbseparator"
        }
        //    ,{
        //        id:"dblite_login",
        //        text:"Login",
        //        tooltip:"User login",
        //        iconCls:"login",
        //        width:25,
        //        handler:Topmenu.showLoginWindow,
        //        scope:this
        //    }
        ]
    },
    getUserControls:function(a){
        return[{
            xtype:"tbtext",
            id:"user_profile",
            text:"Welcome "+a
        },{
            xtype:"tbseparator"
        },{
            id:"settings",
            text:"Settings",
            iconCls:"user_settings",
            width:27,
            handler:function(){
                this.win=Topmenu.createProfileWindow(a);
                this.win.show()
            }
        },{
            xtype:"tbseparator"
        },{
            id:"logout",
            text:"Logout",
            iconCls:"user_logout",
            width:27,
            handler:function(){
                Topmenu.logoutUser()
            }
        }]
    },
    changeUserControls:function(a){
        Topmenu.userControls.removeAll();
        if(a){
            Topmenu.userControls.add(Topmenu.getUserControls(a))
        }else{
            Topmenu.userControls.add(Topmenu.getGuestControls())
        }
    },
    showAboutWindow:function(){
        Topmenu.createAboutWindow()
    },
    createAboutWindow:function(){
        this.win=new Dbl.ContextMenuWindow({
            title:"About DBlite",
            id:"about_window",
            width:400,
            height:400,
            resizable:false,
            autoScroll:true,
            layout:"border",
            onEsc:function(){},
            modal:true,
            plain:true,
            stateful:true,
            items:[{
                xtype:"panel",
                id:"about_panel",
                region:"center",
                frame:true,
                items:[{
                    xtype:"tbtext",
                    text:"",
                    cls:"dblite_about_logo"
                },{
                    id:"about_dblite",
                    autoEl:{
                        tag:"div",
                        style:"margin:10px 30px 4px 30px",
                        html:""
                    },
                }],
                buttonAlign:"left",
                buttons:[]
            }],
            buttons:[{
                text:"Close",
                handler:function(){
                    Ext.getCmp("about_window").close()
                }
            }]
        });
        var b=Ext.getCmp("about_dblite");
        b.autoEl.html='<html><head></head><body>  		<div id="about_dblite_data">  			<h1>DBlite</h1> 			<p>A light weight, fast, flexible interface to MySQL</p>  			<p>Current version: '+Topmenu.version+'</p> 			<a href="http://www.dblite.com/" target="_blank">www.dblite.com</a> 		</div> 	</body></html>';
        this.win.show();
        var a=document.createElement("script");
        a.src="//dblite.com/about?callback=Topmenu.showAboutPage";
        document.getElementsByTagName("head")[0].appendChild(a)
    },
    showAboutPage:function(a){
        Ext.fly("about_dblite").update(a.data)
    },
    showFeedbackWindow:function(){
        var a=Topmenu.createFeedbackForm();
        this.win=new Dbl.ContextMenuWindow({
            title:"Feedback",
            id:"feedback_window",
            width:400,
            height:"auto",
            resizable:false,
            autoScroll:false,
            layout:"form",
            modal:true,
            plain:true,
            stateful:true,
            onEsc:function(){},
            items:[a]
        });
        this.win.show()
    },
    createFeedbackForm:function(){
        var a=[new Ext.form.ComboBox({
            store:new Ext.data.SimpleStore({
                fields:["category"],
                data:[["Bug"],["Feature Request"],["Other"]]
            }),
            displayField:"category",
            forceSelection:true,
            selectOnFocus:true,
            mode:"local",
            width:140,
            triggerAction:"all",
            emptyText:"Select a category",
            fieldLabel:"Category",
            name:"feedback_category",
            allowBlank:false
        }),{
            xtype:"textarea",
            name:"feedback_message",
            width:"270px",
            height:"100px",
            fieldLabel:"Message",
            allowBlank:false,
            multiline:true
        },{
            xtype:"fileuploadfield",
            fieldLabel:"File",
            width:"278px",
            name:"feedback_file",
            buttonText:"Browse"
        },{
            fieldLabel:"Email",
            name:"user_email",
            width:"270px",
            allowBlank:false,
            vtype:"email"
        }];
        var b=[{
            id:"feedback_form",
            text:"Submit",
            handler:Topmenu.submitFeedback
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("feedback_window").close()
            }
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            id:"feedback-form",
            fileUpload:true,
            frame:true,
            labelWidth:74,
            defaultType:"textfield",
            defaults:{
                listeners:{
                    specialkey:function(d,c){
                        if(c.getKey()==c.ENTER){
                            Topmenu.submitFeedback()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    submitFeedback:function(){
        Dbl.Utils.showWaitMask();
        Ext.getCmp("feedback-form").getForm().submit({
            clientValidation:true,
            url:"submitfeedback.php",
            scope:this,
            success:function(a,b){
                Dbl.Utils.hideWaitMask();
                if(b.result.success){
                    Dbl.Utils.showInfoMsg(b.result.msg,"feedback-form");
                    b.form.reset()
                }else{
                    Dbl.Utils.showErrorMsg(b.result.msg,"feedback-form")
                }
            },
            failure:function(a,c){
                var b=(c.failureType=="client")?Messages.getMsg("empty_form_fields"):"Error while submitting form!";
                Dbl.Utils.hideWaitMask();
                Dbl.Utils.showErrorMsg(b,"feedback-form")
            }
        })
    },
    showKeyMappingsWindow:function(){
        this.win=Topmenu.createKeyMappingsWindow();
        this.win.show()
    },
    createKeyMappingsWindow:function(){
        var b=[["F1","Application","Help"],["F3","Application","Key Maps Window"],["F5","Database Explorer","Refresh Database Explorer (Default)"],["F6","Table Structure","Manage Table Columns"],["F7","Table Structure","Manage Table Indexes"],["F8","SQL Editor","Execute Current Query (Default)"],[],[],["Ctrl+1","Database Explorer","Collapse/Expand Database Explorer"],["Ctrl+2","Result Panel","Show/Hide Result Panel"],["Ctrl+3","SQL Editor Panel","Show/Hide SQL Editor Panel"],["Ctrl+D","Database Explorer","Create Database"],["Ctrl+S","SQL Editor Panel","Save The Current SQL Editor"]];
        var a=new Ext.list.ListView({
            border:false,
            store:new Ext.data.ArrayStore({
                storeId:"myStore",
                fields:["Shortcuts","Category","Description"],
                data:b
            }),
            columns:[{
                header:"Shortcuts",
                width:0.15,
                dataIndex:"Shortcuts"
            },{
                header:"Category",
                width:0.25,
                dataIndex:"Category"
            },{
                header:"Description",
                width:0.6,
                dataIndex:"Description"
            }]
        });
        var c={
            title:"Key Mappings ",
            id:"key_mappings_window",
            width:550,
            height:400,
            layout:"fit",
            modal:true,
            stateful:true,
            autoScroll:false,
            resizable:false,
            onEsc:function(){},
            items:[{
                xtype:"panel",
                layout:"fit",
                border:false,
                frame:false,
                items:a
            }],
            buttons:[{
                text:"Close",
                handler:function(){
                    Ext.getCmp("key_mappings_window").close()
                }
            }]
        };
    
        return new Ext.Window(c)
    },
    showRegisterWindow:function(){
        var a=Ext.getCmp("login_window");
        if(a){
            a.close()
        }
        this.win=Topmenu.createRegisterWindow();
        this.win.show()
    },
    createRegisterWindow:function(){
        var b=Topmenu.createRegistrationForm();
        var a={
            title:"User Registration",
            id:"register_window",
            width:320,
            height:"auto",
            resizable:false,
            autoScroll:true,
            layout:"form",
            modal:true,
            plain:true,
            stateful:true,
            onEsc:function(){},
            items:[b]
        };
        
        return new Ext.Window(a)
    },
    showLoginWindow:function(){
        this.win=Topmenu.createLoginWindow();
        this.win.show()
    },
    createLoginWindow:function(){
        var a={
            title:"User Login",
            id:"login_window",
            width:300,
            height:225,
            resizable:false,
            autoScroll:true,
            layout:"border",
            modal:true,
            plain:true,
            stateful:true,
            onEsc:function(){},
            items:[{
                id:"login_form",
                region:"center",
                xtype:"panel",
                layout:"fit",
                border:false,
                items:[Topmenu.createLoginForm()]
            }],
            buttonAlign:"left",
            buttons:[{
                xtype:"panel",
                bodyStyle:"border: none;",
                autoEl:{
                    html:"<a style='text-decoration: none;' href='javascript:void(0);'>Forgot Password</a>",
                    onclick:"Topmenu.showResetPassword()"
                }
            },"->",{
                xtype:"panel",
                bodyStyle:"border: none;",
                autoEl:{
                    html:'<a style="text-decoration: none;" href="javascript:void(0);">Register</a>',
                    onclick:"Topmenu.showRegisterWindow()"
                }
            }]
        };

        return new Ext.Window(a)
    },
    createProfileWindow:function(b){
        var a={
            title:"Settings",
            id:"profile_window",
            width:300,
            height:350,
            resizable:false,
            autoScroll:true,
            layout:"border",
            modal:true,
            plain:true,
            stateful:true,
            onEsc:function(){},
            items:[{
                id:"profile_panel",
                region:"center",
                xtype:"panel",
                layout:"fit",
                border:false,
                items:[Topmenu.createProfilePanel()]
            }]
        };
        
        return new Ext.Window(a)
    },
    createResetPasswordWindow:function(){
        var a={
            title:"Reset Password",
            id:"reset_window",
            width:300,
            height:120,
            resizable:true,
            autoScroll:true,
            layout:"border",
            modal:true,
            plain:true,
            stateful:true,
            items:[{
                id:"reset_form",
                region:"center",
                xtype:"panel",
                layout:"fit",
                border:false,
                items:[Topmenu.resetPasswordFields()]
            }]
        };
        
        Dblite.showWindow(a)
    },
    showResetPassword:function(){
        Ext.getCmp("login_window").close();
        Topmenu.createResetPasswordWindow()
    },
    resetPasswordFields:function(){
        var a=[{
            fieldLabel:"Enter email id",
            name:"reset_email",
            allowBlank:false,
            style:{
                marginBottom:"10px"
            }
        }];
        var b=[{
            text:"Reset",
            handler:Topmenu.resetPassword
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("reset_window").close()
            }
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            id:"reset-form",
            frame:true,
            border:false,
            labelWidth:100,
            defaultType:"textfield",
            defaults:{
                width:150,
                listeners:{
                    specialkey:function(d,c){
                        if(c.getKey()==c.ENTER){
                            Topmenu.resetPassword()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    resetPassword:function(){
        var a=Ext.getCmp("reset-form").getForm().getValues();
        Server.sendCommand("user.reset_user_password",{
            reset_password:a.reset_email
        },function(b){
            if(b.success){
                Dbl.Utils.showInfoMsg(Messages.getMsg("reset_password_success"),"reset-form")
            }else{
                Dbl.Utils.showErrorMsg(b.msg,"reset-form")
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"reset-form")
        })
    },
    createLoginForm:function(){
        var a=[{
            fieldLabel:"Username",
            name:"username",
            ref:"../../defaultButton",
            allowBlank:false,
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Password",
            name:"password",
            allowBlank:false,
            inputType:"password",
            style:{
                marginBottom:"10px"
            }
        },{
            xtype:"checkbox",
            boxLabel:"Remember Me",
            name:"remember_me",
            inputValue:1,
            checked:true
        }];
        var b=[{
            id:"dblite_form_login",
            text:"Login",
            handler:Topmenu.loginUser
        },{
            text:"Continue as Guest",
            handler:Topmenu.continueGuestUser
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            id:"login-form",
            frame:true,
            border:false,
            labelWidth:100,
            defaultType:"textfield",
            defaults:{
                width:150,
                listeners:{
                    specialkey:function(d,c){
                        if(c.getKey()==c.ENTER){
                            Topmenu.loginUser()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    createProfilePanel:function(a){
        return new Ext.TabPanel({
            id:"profile-form",
            border:false,
            activeTab:0,
            tabPosition:"top",
            items:[Topmenu.accountDataForm()]
        })
    },
    accountDataForm:function(){
        var a=[{
            autoEl:{
                tag:"hr"
            }
        },{
            xtype:"textfield",
            fieldLabel:"Email",
            id:"accountData_email",
            value:Topmenu.user.email_id,
            allowBlank:false,
            validateOnBlur:true
        },{
            xtype:"textfield",
            fieldLabel:"Re-type",
            id:"accountData_confEmail",
            autoEl:{
                tag:"hr"
            },
            style:"margin-bottom: 20px",
            allowBlank:false
        },{
            xtype:"textfield",
            inputType:"password",
            fieldLabel:"Password",
            id:"accountData_password",
            emptyText:"Password"
        },{
            xtype:"textfield",
            inputType:"password",
            fieldLabel:"Re-type",
            id:"accountData_confPassword",
            emptyText:"password",
            style:"margin-bottom: 20px"
        },{
            xtype:"textfield",
            fieldLabel:"Current password",
            inputType:"password",
            id:"accountData_oldPassword",
            disabled:true,
            allowBlank:false,
            emptyText:"password"
        },{
            xtype:"tbtext",
            text:"<b>current password</b> is required for the changes to take effect",
            style:"text-align: left; margin-bottom: 10px; margin-left: 105px;"
        }];
        var b=[{
            text:"Update",
            id:"accountUpdate_btn",
            disabled:true,
            handler:Topmenu.updateAccountData
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("profile_window").close()
            }
        }];
        return new Ext.FormPanel({
            id:"accountData_form",
            title:"Account",
            border:false,
            items:a,
            frame:true,
            defaults:{
                width:155
            },
            monitorValid:true,
            trackResetOnLoad:true,
            listeners:{
                clientvalidation:function(c){
                    if(c.getForm().isDirty()){
                        Ext.getCmp("accountUpdate_btn").enable();
                        Ext.getCmp("accountData_oldPassword").enable()
                    }else{
                        Ext.getCmp("accountUpdate_btn").disable();
                        Ext.getCmp("accountData_oldPassword").disable()
                    }
                },
                delay:0
            },
            buttons:b
        })
    },
    updateAccountData:function(){
        var f={};
    
        var g=Ext.getCmp("accountData_username");
        var c=Ext.getCmp("accountData_email");
        var a=Ext.getCmp("accountData_confEmail");
        var b=Ext.getCmp("accountData_password");
        var e=Ext.getCmp("accountData_confPassword");
        var d=Ext.getCmp("accountData_oldPassword");
        if(!c.isDirty()&&!a.isDirty()&&!b.isDirty()&&!e.isDirty()){
            return
        }
        if(d.getValue()==""){
            Dbl.Utils.showErrorMsg(Messages.getMsg("current_password_required"));
            return
        }
        if((c.isDirty()||a.isDirty())&&!(c.getValue()==""&&a.getValue()=="")){
            f.newemail=c.getValue();
            f.confnewemail=a.getValue()
        }
        if((b.isDirty()||e.isDirty())&&!(b.getValue()==""&&e.getValue()=="")){
            f.newpassword=b.getValue();
            f.confnewpass=e.getValue()
        }
        f.oldPassword=d.getValue();
        Server.sendCommand("user.change_userdata",f,function(h){
            if(h.success){
                Ext.getCmp("profile_window").close();
                Dbl.Utils.showInfoMsg(Messages.getMsg("account_update_success"));
                Topmenu.updateUserData(function(){})
            }else{
                if(!h.success){
                    Dbl.Utils.showErrorMsg(h.msg)
                }
            }
        },function(j){
            var h=j.msg?j.msg:j;
            Dbl.Utils.showErrorMsg(h)
        })
    },
    changePasswordForm:function(){
        var a=[{
            fieldLabel:"New password",
            width:150,
            name:"new_pwd",
            ref:"../../defaultButton",
            allowBlank:false,
            inputType:"password",
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Confirm password",
            name:"new_repwd",
            allowBlank:false,
            inputType:"password",
            style:{
                marginBottom:"10px"
            }
        }];
        var b=[{
            id:"pwd_change",
            text:"Change",
            handler:Topmenu.changePassword
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("profile_window").close()
            }
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            title:"Change Password",
            id:"changepwd-form",
            defaultType:"textfield",
            defaults:{
                width:150,
                listeners:{
                    specialkey:function(d,c){
                        if(c.getKey()==c.ENTER){
                            Topmenu.changePassword()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    changeEmailForm:function(){
        var a=[{
            fieldLabel:"New email",
            name:"new_email",
            ref:"../../defaultButton",
            allowBlank:false,
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Confirm email",
            name:"new_reemail",
            allowBlank:false,
            style:{
                marginBottom:"10px"
            }
        }];
        var b=[{
            id:"email_change",
            text:"Change",
            handler:Topmenu.changeEmail
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("profile_window").close()
            }
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            title:"Change email",
            id:"changeemail-form",
            defaultType:"textfield",
            defaults:{
                width:150,
                listeners:{
                    specialkey:function(d,c){
                        if(c.getKey()==c.ENTER){
                            Topmenu.changeEmail()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    changeUsernameForm:function(){
        var a=[{
            fieldLabel:"New username",
            name:"new_username",
            ref:"../../defaultButton",
            allowBlank:false,
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Confirm username",
            name:"new_reusername",
            allowBlank:false,
            style:{
                marginBottom:"10px"
            }
        }];
        var b=[{
            id:"username_change",
            text:"Change",
            handler:Topmenu.changeUsername
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("profile_window").close()
            }
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            title:"Change username",
            id:"changeusername-form",
            defaultType:"textfield",
            defaults:{
                width:150,
                listeners:{
                    specialkey:function(d,c){
                        if(c.getKey()==c.ENTER){
                            Topmenu.changeUsername()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    loginUser:function(){
        var a=Ext.getCmp("login-form").getForm().getFieldValues();
        Server.sendCommand("user.login_user",{
            username:a.username,
            password:a.password,
            remember_me:a.remember_me
        },function(b){
            if(b.success){
                Ext.getCmp("login_window").close();
                window.onbeforeunload=null;
                window.location.reload()
            }else{
                Dbl.Utils.showErrorMsg(b.msg,"login-form")
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"register-form")
        })
    },
    createRegistrationForm:function(){
        var a=[{
            fieldLabel:"Username",
            name:"register_username",
            allowBlank:false,
            ref:"../../defaultButton",
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Password",
            name:"register_password",
            allowBlank:false,
            inputType:"password",
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Re-enter password",
            name:"register_confpass",
            allowBlank:false,
            inputType:"password",
            style:{
                marginBottom:"10px"
            }
        },{
            fieldLabel:"Email",
            name:"register_email",
            allowBlank:false,
            vtype:"email"
        }];
        if(Dbl.UserActivity.getValue("connection")){
            var c={
                xtype:"checkbox",
                checked:true,
                name:"register_saveToAccount",
                boxLabel:"Save current details to your new account"
            };
    
            a.push(c)
        }
        var b=[{
            id:"dblite_form_register",
            text:"Register",
            handler:Topmenu.registerUser
        },{
            text:"Cancel",
            handler:function(){
                Ext.getCmp("register_window").close()
            }
        }];
        return new Ext.FormPanel({
            bodyStyle:"padding:5px 5px 0",
            id:"register-form",
            frame:true,
            labelWidth:120,
            defaultType:"textfield",
            defaults:{
                width:150,
                listeners:{
                    specialkey:function(f,d){
                        if(d.getKey()==d.ENTER){
                            Topmenu.registerUser()
                        }
                    }
                }
            },
            items:a,
            buttons:b
        })
    },
    registerUser:function(){
        var a=Ext.getCmp("register-form").getForm().getFieldValues();
        Server.sendCommand("user.register_user",{
            username:a.register_username,
            password:a.register_password,
            confpass:a.register_confpass,
            email:a.register_email,
            saveToAccount:a.register_saveToAccount
        },function(b){
            if(b.success){
                window.onbeforeunload=null;
                window.location.reload()
            }else{
                if(!b.success){
                    Dbl.Utils.showErrorMsg(b.msg,"register-form")
                }
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"register-form")
        })
    },
    changePassword:function(){
        var a=Ext.getCmp("changepwd-form").getForm().getFieldValues();
        Server.sendCommand("user.change_userdata",{
            newpassword:a.new_pwd,
            confnewpass:a.new_repwd
        },function(b){
            if(b.success){
                Ext.getCmp("changepwd-form").getForm().reset();
                Ext.getCmp("profile_window").close();
                Dbl.Utils.showInfoMsg(Messages.getMsg("change_password_success"),"changepwd-form")
            }else{
                if(!b.success){
                    Dbl.Utils.showErrorMsg(b.msg,"changepwd-form")
                }
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"changepwd-form")
        })
    },
    changeEmail:function(){
        var a=Ext.getCmp("changeemail-form").getForm().getFieldValues();
        Server.sendCommand("user.change_userdata",{
            newemail:a.new_email,
            confnewemail:a.new_reemail
        },function(b){
            if(b.success){
                Ext.getCmp("changeemail-form").getForm().reset();
                Ext.getCmp("profile_window").close();
                Dbl.Utils.showInfoMsg(Messages.getmsg("change_email_success"),"changeemail-form")
            }else{
                if(!b.success){
                    Dbl.Utils.showErrorMsg(b.msg,"changeemail-form")
                }
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"changeemail-form")
        })
    },
    changeUsername:function(){
        var a=Ext.getCmp("changeusername-form").getForm().getFieldValues();
        Server.sendCommand("user.change_userdata",{
            newusername:a.new_username,
            confnewusername:a.new_reusername
        },function(b){
            if(b.success){
                Ext.getCmp("changeusername-form").getForm().reset();
                Ext.getCmp("profile_window").close();
                Topmenu.changeUserControls(b.username);
                Dbl.Utils.showInfoMsg(Messages.getMsg("change_username_success"),"changeusername-form")
            }else{
                if(!b.success){
                    Dbl.Utils.showErrorMsg(b.msg,"changeusername-form")
                }
            }
        },function(c){
            var b=c.msg?c.msg:c;
            Dbl.Utils.showErrorMsg(b,"changeusername-form")
        })
    },
    logoutUser:function(){
        Server.sendCommand("user.logout_user",{},function(a){
            window.location.reload()
        })
    },
    continueGuestUser:function(){
        Server.sendCommand("user.continue_guest_user",{
            guest_user:"guest_user"
        },function(a){
            Dblite.guest_user=true;
            Ext.getCmp("login_window").close();
            if(Ext.getCmp("prompt_register_login")){
                Ext.getCmp("prompt_register_login").close()
            }
            Ext.getCmp("destroy_current_session").show();
            Ext.getCmp("destroy_session_separator").show();
            Topmenu.userControls.doLayout()
        })
    },
    destroyCurrentSession:function(){
        Server.sendCommand("user.destroy_session",{},function(a){
            window.location.reload()
        })
    },
    enableExecuteButton:function(){
        var a=Ext.getCmp("topmenu_execute_btn");
        a.setIconClass("execute_query");
        a.setTooltip("Execute query (F8)");
        a.enable()
    },
    disableExecuteButton:function(){
        var a=Ext.getCmp("topmenu_execute_btn");
        a.setIconClass("loading_icon");
        a.setTooltip("Executing...");
        a.disable()
    },
    showDbliteHelpWindow:function(){
        window.open("http://dblite.com/features","_blank");
        return
    }
};

Dbl.UserActivity={
    explorerPanel:{
        newConnectionSelected:function(a,b){
            Dbl.UserActivity.setKeys([{
                key:"connection",
                value:a
            },{
                key:"connection_db",
                value:b
            },{
                key:"database",
                value:""
            },{
                key:"table",
                value:""
            },{
                key:"table_type",
                value:""
            }])
        },
        newDatabaseSelected:function(a){
            Dbl.UserActivity.setKeys([{
                key:"database",
                value:a
            },{
                key:"table",
                value:""
            },{
                key:"table_type",
                value:""
            }]);
            Explorer.selectedDatabase=a;
            Explorer.selectedTable=""
        },
        newTableSelected:function(b,c,a){
            Dbl.UserActivity.setKeys([{
                key:"database",
                value:c
            },{
                key:"table",
                value:b
            },{
                key:"table_type",
                value:a
            }]);
            Explorer.selectedDatabase=c;
            Explorer.selectedTable=b
        }
    },
    editorsPanel:{
        delimiterChanged:function(a){
            Dbl.UserActivity.setKey("sqlDelimiter",a)
        },
        tabChanged:function(){
            if(Editor.restoring){
                return
            }else{
                Dbl.UserActivity.setKey("editorTabList",Ext.encode(Editor.editorList))
            }
        }
    },
    dataPanel:{
        tabChanged:function(a){
            if(Explorer.restoring){
                return
            }
            Dbl.UserActivity.setKey("datapanelActiveTab",a)
        },
        serverTabChanged:function(a){
            if(Explorer.restoring){
                return
            }
            Dbl.UserActivity.setKey("activeConnTab",a)
        },
        dbTabChanged:function(a){
            if(Explorer.restoring){
                return
            }
            Dbl.UserActivity.setKey("activeDbTab",a)
        },
        tableTabChanged:function(a){
            if(Explorer.restoring){
                return
            }
            Dbl.UserActivity.setKey("activeTableTab",a)
        },
        newSubTabSelected:function(a){
            if(Explorer.restoring){
                return
            }
            var b;
            switch(Dbl.UserActivity.getValue("datapanelActiveTab")){
                case"tablestructure":
                    b="activeTableTab";
                    break;
                case"dbstructure":
                    b="activeDbTab";
                    break;
                case"serverstructure":
                    b="activeConnTab";
                    break
            }
            Dbl.UserActivity.setKey(b,a)
        }
    },
    pageLayout:{
        resizeExplorerPanel:function(){
            Dbl.UserActivity.setKey("explorerWidth",Explorer.explorerPanel.getWidth())
        },
        collapseExplorerPanel:function(){
            Dbl.UserActivity.setKey("explorerCollapsed",true)
        },
        expandExplorerPanel:function(){
            Dbl.UserActivity.setKey("explorerCollapsed",false)
        },
        resizeSQLBrowserPanel:function(){
            Dbl.UserActivity.setKey("sqlBrowserWidth",Editor.browserContainerPanel.getWidth())
        },
        collapseSQLBrowserPanel:function(){
            Dbl.UserActivity.setKey("sqlBrowserCollapsed",true)
        },
        expandSQLBrowserPanel:function(){
            Dbl.UserActivity.setKey("sqlBrowserCollapsed",false)
        },
        resizeEditorPanel:function(){
            Dbl.UserActivity.setKey("datapanelHeight",Dblite.dataPanel.getHeight())
        },
        showHideDatapanel:function(){
            Dbl.UserActivity.setKey("datapanelHidden",Dblite.dataPanel.hidden)
        }
    },
    setKey:function(a,b,c){
        if(Dbl.UserActivity.keys[a]==b){
            return
        }
        if(Dbl.UserActivity.restoringMode==true){
            return
        }
        Dbl.UserActivity.keys[a]=b;
        Dbl.UserActivity.updateAtServer({
            key:a,
            value:b
        })
    },
    setKeys:function(b){
        if(Dbl.UserActivity.restoringMode==true){
            return
        }
        for(var a=0;a<b.length;a++){
            var c=b[a];
            Dbl.UserActivity.keys[c.key]=c.value
        }
        Dbl.UserActivity.updateAtServer(b)
    },
    getValue:function(a){
        return Dbl.UserActivity.keys[a]
    },
    keys:[],
    restore:function(){
        Explorer.restore();
        Editor.restore()
    },
    updateAtServer:function(a){
        if(typeof(a)=="object"){
            if(a instanceof Array){
                Server.sendCommand("user.update_user_activities",a,function(b){})
            }else{
                Server.sendCommand("user.update_user_activity",a,function(b){})
            }
        }
    }
};

Dbl.UserSettings={
    explorerPosition:"",
    explorerWidth:"",
    datapanelTabPosition:"",
    datapanelHeight:"",
    getSettings:function(){
        Server.sendCommand("user.retrieve_user_activity",{},function(c){
            Dblite.user=c.user;
            Dblite.guest_user=c.guestUser;
            if(Dblite.user){
                c.editorTabList=Ext.encode(c.editorTabList)
            }
            if(!c.explorerWidth||parseInt(c.explorerWidth)<100){
                c.explorerWidth=250
            }
            if(!c.sqlBrowserWidth||parseInt(c.sqlBrowserWidth)<100||parseInt(c.sqlBrowserWidth)>400){
                c.sqlBrowserWidth=200
            }
            if(!c.datapanelHeight||parseInt(c.datapanelHeight)<200){
                c.datapanelHeight=200
            }
            Dbl.UserSettings.explorerWidth=c.explorerWidth;
            Dbl.UserSettings.explorerCollapsed=c.explorerCollapsed;
            Dbl.UserSettings.sqlBrowserWidth=c.sqlBrowserWidth;
            Dbl.UserSettings.sqlBrowserCollapsed=c.sqlBrowserCollapsed;
            Dbl.UserSettings.datapanelHeight=c.datapanelHeight;
            Dbl.UserSettings.datapanelHidden=c.datapanelHidden;
            Dbl.UserActivity.keys=c;
            Editor.defaultSQLDelimiter=c.sqlDelimiter?c.sqlDelimiter:";";
            Dblite.refreshServerList();
            Server.restoring=true;
            var a=Dbl.UserActivity.getValue("connection");
            var b=Dbl.UserActivity.getValue("connection_db");
            if(a){
                Server.serverChanged(a,b)
            }
            Server.restoring=false;
            Dblite.init()
        })
    }
};

Ext.onReady(Dbl.UserSettings.getSettings,null,{
    delay:Ext.isGecko?1000:1000
});