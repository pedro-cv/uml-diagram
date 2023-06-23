/*! JointJS+ v3.5.0 - HTML5 Diagramming Framework - TRIAL VERSION

Copyright (c) 2022 client IO

 2022-10-13 


This Source Code Form is subject to the terms of the JointJS+ Trial License
, v. 2.0. If a copy of the JointJS+ License was not distributed with this
file, You can obtain one at http://jointjs.com/license/rappid_v2.txt
 or from the JointJS+ archive as was distributed by client IO. See the LICENSE file.*/


var App = App || {};
App.config = App.config || {};

(function() {

    'use strict';

    App.config.stencil = {};

    App.config.stencil.groups = {
        //standard: { index: 1, label: 'Modelo C4' },
        /* fsa: { index: 2, label: 'State machine' },
        pn: { index: 3, label: 'Petri nets' },
        erd: { index: 4, label: 'Entity-relationship' },
        */uml: { index: 5, label: 'UML' },
        /*org: { index: 6, label: 'ORG' } */
    };

    App.config.stencil.shapes = {};

    App.config.stencil.shapes.standard = [
        /* person */
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Person 1-2',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: `${person}`
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                },
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                headerText: {
                    text: 'Person name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "50%"
                },
                subHeaderText: {
                    text: '[Person]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "60%"
                },
                contentText: {
                    text: 'Description of person.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "75%"
                }
            }
        },
        /* external person */
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'External Person 1-2',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: `${person2}`
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                },
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                headerText: {
                    text: 'External person name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "50%"
                },
                subHeaderText: {
                    text: '[Person]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "60%"
                },
                contentText: {
                    text: 'Description of external person.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "75%"
                }
            }
        },
        /* software system */
        {
            type: 'standard.Rectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Software System 1',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 8,
                    ry: 8,
                    width: 50,
                    height: 30,
                    fill: '#1061B0',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    /* strokeDasharray: '5' */
                },
                /* label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    // refY: -4,
                    // refY2: 4,
                }, */
                headerText: {
                    text: 'System name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "34%"
                },
                subHeaderText: {
                    text: '[Software System]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "48%"
                },
                contentText: {
                    text: 'Description of software system.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "65%"
                }
                
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                
            }
        },
        /* external software system */
        {
            type: 'standard.Rectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'External Software System 1-2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 8,
                    ry: 8,
                    width: 50,
                    height: 30,
                    fill: '#8C8496',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    /* strokeDasharray: '5' */
                },
                /* label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    // refY: -4,
                    // refY2: 4,
                }, */
                headerText: {
                    text: 'External system name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "34%"
                },
                subHeaderText: {
                    text: '[Software System]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "48%"
                },
                contentText: {
                    text: 'External system name',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "65%"
                }
                
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                
            }
        },
        /* container */
        {
            type: 'standard.Rectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Container 2',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 8,
                    ry: 8,
                    width: 50,
                    height: 30,
                    fill: '#23A2D9',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    /* strokeDasharray: '3' */
                },
                /* label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    // refY: -4,
                    // refY2: 4,
                }, */
                headerText: {
                    text: 'Container name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "34%"
                },
                subHeaderText: {
                    text: '[Container: e.g. SpringBoot, ElasticSearch, etc.]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "48%"
                },
                contentText: {
                    text: 'Description of container role/responsibility.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "65%"
                }
                
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                
            }
        }, 
        /* container DB vertical*/
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Data Container 2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: `${data_container}`
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                },
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                headerText: {
                    text: 'Container name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "38%"
                },
                subHeaderText: {
                    text: '[Container: e.g. Oracle Database 12]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "48%"
                },
                contentText: {
                    text: 'Description of storage type container\nrole/responsibility.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "63%"
                }
            }
        },
        /* container microservice type*/
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Microservice Container 2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: `${hexagon}`
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                },
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                headerText: {
                    text: 'Container name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "35%"
                },
                subHeaderText: {
                    text: '[Container: e.g. Micronaut, etc.]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "45%"
                },
                contentText: {
                    text: 'Description of microservice type\ncontainer role/responsibility.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "65%"
                }
            }
        },
        /* container message bus type horizontal cilinder*/
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Message Bus Container 2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: `${cylinder_horizontal}`
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                },
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                headerText: {
                    text: 'Container name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "35%"
                },
                subHeaderText: {
                    text: '[Container: e.g. Apache Kafka, etc.]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "45%"
                },
                contentText: {
                    text: 'Description of message bus type\ncontainer role/responsibility.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "60%"
                }
            }
        },
        /* container web browser */
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Web Browser Container 2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: `${web_browser}`
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                /* body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                }, */
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                headerText: {
                    text: 'Container name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "36%"
                },
                subHeaderText: {
                    text: '[Content: e.g. JavaScript, Angular etc.]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "45%"
                },
                contentText: {
                    text: 'Description of web browser\ncontainer role/responsibility.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "62%"
                }
            }
        },
        /* component */
        {
            type: 'standard.Rectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Component 3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 8,
                    ry: 8,
                    width: 50,
                    height: 30,
                    fill: '#63BEF2',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    /* strokeDasharray: '5' */
                },
                /* label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    // refY: -4,
                    // refY2: 4,
                }, */
                headerText: {
                    text: 'Component name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "34%"
                },
                subHeaderText: {
                    text: '[Component: e.g. Spring Service]',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "48%"
                },
                contentText: {
                    text: 'Description of component role/responsibility.',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "65%"
                }
                
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                
            }
        },
        /* container software system transparent */
        {
            type: 'standard.Rectangle',
            size: { width: 40, height: 35 },
            attrs: {
                root: {
                    dataTooltip: 'System scope boundary 1-2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 8,
                    ry: 8,
                    width: 50,
                    height: 30,
                    fill: 'transparent',
                    stroke: '#666666',
                    strokeWidth: 1,
                    strokeDasharray: '5'
                },
                headerText: {
                    text: 'Software System',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "90%",
                    refX: "4%",
                    textVerticalAnchor: "bottom",
                    textAnchor: "bottom",
                },
                subHeaderText: {
                    text: '[Software System]',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "95%",
                    refX: "4%",
                    textVerticalAnchor: "bottom",
                    textAnchor: "bottom",
                },
                contentText: {
                    text: '',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "98%",
                    refX: "4%",
                    textVerticalAnchor: "bottom",
                    textAnchor: "bottom",
                }
                
                /* label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                
            }
        },
        /* container container transparent */
        {
            type: 'standard.Rectangle',
            size: { width: 40, height: 35 },
            attrs: {
                root: {
                    dataTooltip: 'Container scope boundary 1-2-3',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 8,
                    ry: 8,
                    width: 50,
                    height: 30,
                    fill: 'transparent',
                    stroke: '#666666',
                    strokeWidth: 1,
                    strokeDasharray: '5'
                },
                /* label: {
                    text: 'rect',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    // refY: -4,
                    // refY2: 4,
                }, */
                headerText: {
                    text: 'Container name',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "90%",
                    refX: "4%",
                    textVerticalAnchor: "bottom",
                    textAnchor: "bottom",
                },
                subHeaderText: {
                    text: '[Container]',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "95%",
                    refX: "4%",
                    textVerticalAnchor: "bottom",
                    textAnchor: "bottom",
                },
                contentText: {
                    text: '',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "98%",
                    refX: "4%",
                    textVerticalAnchor: "bottom",
                    textAnchor: "bottom",
                },
                
                /* label: {
                   text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                }, */
                 
            }
        },
        /* Main circle */
        {
            type: 'standard.InscribedImage',
            size: { width: 30, height: 30 },
            attrs: {
                root: {
                    dataTooltip: 'Main Code 4',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                border: {
                    stroke: '#000000',
                    strokeWidth: 1,
                    strokeDasharray: '0'
                },
                background: {
                    fill: 'transparent'
                },
                image: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Main',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        },
        /* Code content */
        {
            type: 'standard.Rectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Main Content Code 4',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                header: {
                    stroke: '#000000',
                    fill: 'transparent',
                    strokeWidth: 1,
                    strokeDasharray: '0',
                    height: 20,
                    refY: "33.33%",
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    rx: 2,
                    ry: 2,
                    width: 50,
                    height: 30,
                    fill: 'transparent',
                    stroke: '#000000',
                    strokeWidth: 1,
                    strokeDasharray: '0'
                },
                
                headerText: {
                    text: 'Main Code',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "20%",
                },
                subHeaderText: {
                    text: '[Code Container]',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "50%",
                },
                contentText: {
                    text: 'Contenido de codigo',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "80%",
                }, 
            }
        },
        /* Package */
        {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Package Code 4',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: './../../assets/image-package.svg'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                content: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                headerText: {
                    text: 'Package name',
                    fill: '#000000',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "15%"
                },
                subHeaderText: {
                    text: '',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "45%"
                },
                contentText: {
                    text: '',
                    fill: '#E7E7E7',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 4,
                    strokeWidth: 0,
                    refY: "62%"
                }
            }
        },
        /* {
            type: 'standard.EmbeddedImage',
            size: { width: 53, height: 42 },
            attrs: {
                root: {
                    dataTooltip: 'Image',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                image: {
                    xlinkHref: './assets/image-hexagon.svg'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 20
                },
                subHeader: {
                    stroke: 'transparent',
                    fill: 'transparent',
                    strokeWidth: 0,
                    strokeDasharray: '0',
                    height: 0
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 0,
                    strokeDasharray: '0'
                },
                label: {
                    text: 'Container name',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    fill: '#c6c7e2',
                    refY2: 12,
                },
                headerText: {
                    text: 'Container name',
                    fill: '#ffffff',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "30%"
                },
                subHeaderText: {
                    text: 'Description of microservice type',
                    fill: '#F9F9F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 8,
                    strokeWidth: 0,
                    refY: "40%"
                }
            }
        }, */
        /* {
            type: 'standard.InscribedImage',
            size: { width: 1, height: 1 },
            attrs: {
                root: {
                    dataTooltip: 'Icon',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                border: {
                    stroke: '#31d0c6',
                    strokeWidth: 3,
                    strokeDasharray: '0'
                },
                background: {
                    fill: 'transparent'
                },
                image: {
                    xlinkHref: 'assets/image-icon1.svg'
                },
                label: {
                    text: 'icon',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        }, */
        /* {
            type: 'standard.HeaderedRectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Rectangle with header',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0',
                    height: 20
                },
                bodyText: {
                    textWrap: {
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie.',
                        width: -10,
                        height: -20,
                        ellipsis: true
                    },
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    refY2: 12,
                },
                headerText: {
                    text: 'header',
                    fill: '#f6f6f6',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    refY: 12
                }
            }
        } */
    ];
/* 
    App.config.stencil.shapes.fsa = [

        {
            type: 'fsa.StartState',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'Start State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                circle: {
                    width: 50,
                    height: 30,
                    fill: '#61549c',
                    'stroke-width': 0
                },
                text: {
                    text: 'startState',
                    fill: '#c6c7e2',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'fsa.EndState',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'End State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.inner': {
                    fill: '#6a6c8a',
                    stroke: 'transparent'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#61549c',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'endState',
                    fill: '#c6c7e2',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'fsa.State',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                circle: {
                    fill: '#6a6c8a',
                    stroke: '#61549c',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'state',
                    fill: '#c6c7e2',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        }
    ];

    App.config.stencil.shapes.pn = [

        {
            type: 'pn.Place',
            preserveAspectRatio: true,
            tokens: 3,
            attrs: {
                root: {
                    dataTooltip: 'Place',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.root': {
                    fill: 'transparent',
                    stroke: '#61549c',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                '.tokens circle': {
                    fill: '#6a6c8a',
                    stroke: '#000',
                    'stroke-width': 0
                },
                '.label': {
                    text: '',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal'
                }
            }
        },
        {
            type: 'pn.Transition',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'Transition',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                rect: {
                    rx: 3,
                    ry: 3,
                    width: 12,
                    height: 50,
                    fill: '#61549c',
                    stroke: '#7c68fc',
                    'stroke-width': 0,
                    'stroke-dasharray': '0'
                },
                '.label': {
                    text: 'transition',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'stroke-width': 0,
                    'fill': '#222138'
                }
            }
        }
    ];

    App.config.stencil.shapes.erd = [

        {
            type: 'erd.Entity',
            attrs: {
                root: {
                    dataTooltip: 'Entity',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    rx: 3,
                    ry: 3,
                    fill: '#31d0c6',
                    'stroke-width': 2,
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Entity',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.WeakEntity',
            attrs: {
                root: {
                    dataTooltip: 'Weak Entity',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#feb663',
                    'stroke-width': 2,
                    points: '100,0 100,60 0,60 0,0',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#feb663',
                    stroke: 'transparent',
                    points: '97,5 97,55 3,55 3,5',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Weak entity',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Relationship',
            attrs: {
                root: {
                    dataTooltip: 'Relationship',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: '#61549c',
                    stroke: 'transparent',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Relation',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.IdentifyingRelationship',
            attrs: {
                root: {
                    dataTooltip: 'Identifying Relationship',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#6a6c8a',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#6a6c8a',
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Relation',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.ISA',
            attrs: {
                root: {
                    dataTooltip: 'ISA',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                text: {
                    text: 'ISA',
                    fill: '#f6f6f6',
                    'letter-spacing': 0,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                polygon: {
                    fill: '#feb663',
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                }
            }
        },
        {
            type: 'erd.Key',
            attrs: {
                root: {
                    dataTooltip: 'Key',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#fe854f',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#fe854f',
                    stroke: 'transparent',
                    display: 'block',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Key',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Normal',
            attrs: {
                root: {
                    dataTooltip: 'Normal',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: '#feb663',
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Normal',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Multivalued',
            attrs: {
                root: {
                    dataTooltip: 'Mutltivalued',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#fe854f',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#fe854f',
                    stroke: 'transparent',
                    rx: 43,
                    ry: 21,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'MultiValued',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Derived',
            attrs: {
                root: {
                    dataTooltip: 'Derived',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#fe854f',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#feb663',
                    stroke: 'transparent',
                    'display': 'block',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Derived',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        }
    ];
*/
    App.config.stencil.shapes.uml = [

       /*  {
            type: 'uml.Class',
            name: 'Class',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Class',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    top: 2,
                    fill: '#61549c',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    top: 2,
                    fill: '#61549c',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    top: 2,
                    fill: '#61549c',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },
        {
            type: 'uml.Interface',
            name: 'Interface',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Interface',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    fill: '#fe854f',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    fill: '#fe854f',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    fill: '#fe854f',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },
        {
            type: 'uml.Abstract',
            name: 'Abstract',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Abstract',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    fill: '#6a6c8a',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    fill: '#6a6c8a',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    fill: '#6a6c8a',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },
 */
        {
            type: 'uml.State',
            name: 'State',
            events: ['id INT PRIMARY', 'name VARCHAR(10)'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-state-body': {
                    fill: '#feb663',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8,
                    'stroke-dasharray': '0'
                },
                '.uml-state-separator': {
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    'stroke-dasharray': '0'
                },
                '.uml-state-name': {
                    fill: '#f6f6f6',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal'
                },
                '.uml-state-events': {
                    fill: '#f6f6f6',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal'
                }
            }
        }
    ];
/*
    App.config.stencil.shapes.org = [

        {
            type: 'org.Member',
            attrs: {
                root: {
                    dataTooltip: 'Member',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.rank': {
                    text: 'Rank',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-size': 12,
                    'font-weight': 'Bold',
                    'text-decoration': 'none'
                },
                '.name': {
                    text: 'Person',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 10
                },
                '.card': {
                    fill: '#31d0c6',
                    stroke: 'transparent',
                    'stroke-width': 0,
                    'stroke-dasharray': '0'
                },
                image: {
                    width: 32,
                    height: 32,
                    x: 16,
                    y: 13,
                    ref: null,
                    'ref-x': null,
                    'ref-y': null,
                    'y-alignment': null,
                    'xlink:href': 'assets/member-male.png'
                }
            }
        }
    ];
 */
})();
