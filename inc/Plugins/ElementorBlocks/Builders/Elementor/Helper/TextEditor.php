<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;

trait TextEditor
{
    private function anchor_style($prefix = '', $css_selector = '.wpe-text-editor a', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_anchor_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Anchor', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_anchor_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_anchor_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_anchor_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_anchor_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_control(
            "wpe_st_anchor_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_anchor_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_anchor_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_anchor_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_anchor_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_anchor_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_anchor_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_anchor_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_anchor_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_control(
            "wpe_st_anchor_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_anchor_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_anchor_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_anchor_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_anchor_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_anchor_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_anchor_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_anchor_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Anchor', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'anchor_heading',
			[
				'label' => esc_htmlesc_html__( 'Anchor Style', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->end_controls_section();
    }
    }

    private function paragraph_style($prefix = '', $css_selector = '.wpe-text-editor p', $show_section = false)
    { 
        if($show_section==true){
		// For Paragraph styles
		$this->start_controls_section(
			"wpe_st_paragraph_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Paragraph', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_paragraph_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_paragraph_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_paragraph_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_paragraph_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_control(
            "wpe_st_paragraph_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_paragraph_text_stroke{$prefix}",
                "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_paragraph_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_paragraph_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_paragraph_border{$prefix}",
                "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_paragraph_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"=> 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_paragraph_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_paragraph_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_paragraph_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_paragraph_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_paragraph_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_paragraph_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_paragraph_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_paragraph_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_paragraph_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_paragraph_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_paragraph_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Paragraph', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'paragraph_heading',
                [
					'label' => esc_htmlesc_html__( 'Anchor Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }}

    private function button_style($prefix = '', $css_selector = '.wpe-text-editor btn', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_button_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Button', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_button_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_button_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_button_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_button_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_button_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_button_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_button_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_button_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_button_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_button_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"=> 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_button_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_button_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
            
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_button_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_button_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_button_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' =>   "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_button_hover_border{$prefix}",
                'selector' =>   "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_button_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_button_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_button_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_button_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
     
    }
    else{
        $this->start_controls_section(
			"wpe_st_button_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Button', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'button_heading',
                [
					'label' => esc_htmlesc_html__( 'Button Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function heading_1_style($prefix = '', $css_selector = '.wpe-text-editor h1', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_heading_1_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 1', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_heading_1_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_heading_1_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_1_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_1_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_1_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_heading_1_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_control(
            "wpe_st_heading_1_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_1_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_1_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_1_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_1_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_1_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_heading_1_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_heading_1_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_1_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_1_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_1_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_1_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_1_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_1_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_h1_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 1', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'h1_heading',
                [
					'label' => esc_htmlesc_html__( 'Heading 1 Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function heading_2_style($prefix = '', $css_selector = '.wpe-text-editor h2', $show_section = false)
    { 
        if($show_section==true){
        $this->start_controls_section(
        "wpe_st_heading_2_style{$prefix}",
        [
			'label' => esc_htmlesc_html__( 'Heading 2', 'wpessential-elementor-blocks' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_heading_2_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_heading_2_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_2_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_2_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_2_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_heading_2_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_control(
            "wpe_st_heading_2_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_2_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_2_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_2_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_2_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_2_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_heading_2_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_heading_2_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_2_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_2_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_2_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_2_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_2_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_2_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_h2_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 2', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'h2_heading',
                [
					'label' => esc_htmlesc_html__( 'Heading 2 Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function heading_3_style($prefix = '', $css_selector = '.wpe-text-editor h3', $show_section = false)
    {
         if($show_section==true){
        $this->start_controls_section(
			"wpe_st_heading_3_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 3', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_heading_3_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_heading_3_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_3_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_3_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_3_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_heading_3_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_control(
            "wpe_st_heading_3_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_3_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_3_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_3_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    '{{WRAPPER}} .wpe-text-editor h3' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_3_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_3_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_heading_3_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_heading_3_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_3_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_3_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_3_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_3_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_3_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_3_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_h3_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 3', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'h3_heading',
                [
					'label' => esc_htmlesc_html__( 'Heading 3 Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function heading_4_style($prefix = '', $css_selector = '.wpe-text-editor h4', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_heading_4_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 4', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_heading_4_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_heading_4_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_4_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_4_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_4_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_heading_4_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_control(
            "wpe_st_heading_4_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_4_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_4_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_4_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_4_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_4_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_heading_4_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_heading_4_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_4_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_4_hover_border{$prefix}",
                "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_4_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_4_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_4_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_4_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_h4_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 4', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'h4_heading',
                [
					'label' => esc_htmlesc_html__( 'Heading 4 Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function heading_5_style($prefix = '', $css_selector = '.wpe-text-editor h5', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_heading_5_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 5', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_heading_5_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_heading_5_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_5_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_5_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_5_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_heading_5_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_control(
            "wpe_st_heading_5_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_5_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_5_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}" ,
            ]
        );
        $this->add_control(
            "wpe_st_heading_5_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_5_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_5_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_heading_5_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_heading_5_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_5_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_5_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_heading_5_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_5_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_5_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_5_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_h5_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 5', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'h5_heading',
                [
					'label' => esc_htmlesc_html__( 'Heading 5 Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function heading_6_style($prefix = '', $css_selector = '.wpe-text-editor h6', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_heading_6_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 6', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_heading_6_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_heading_6_norma{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_6_typograph{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_6_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_6_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_heading_6_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_heading_6_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_6_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_6_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_heading_6_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_heading_6_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_6_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_heading_6_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_heading_6_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_heading_6_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_heading_6_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_heading_6_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_heading_6_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_heading_6_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_heading_6_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_h6_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Heading 6', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'h6_heading',
                [
					'label' => esc_htmlesc_html__( 'Heading 6 Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function pre_tag_style($prefix = '', $css_selector = '.wpe-text-editor pre', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_pre_tag_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Pre tag', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_pre_tag_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_pre_tag_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_pre_tag_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_pre_tag_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_pre_tag_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_pre_tag_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_pre_tag_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_pre_tag_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_pre_tag_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_pre_tag_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_pre_tag_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_pre_tag_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_pre_tag_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_pre_tag_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_pre_tag_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_pre_tag_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_pre_tag_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_pre_tag_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_pre_tag_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_pre_tag_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
     }
      else{
        $this->start_controls_section(
			"wpe_st_pre_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Pre', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'pre_heading',
                [
					'label' => esc_htmlesc_html__( 'Pre Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function figure_style($prefix = '', $css_selector = '.wpe-text-editor figure', $show_section = false)
    {
        
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_figure_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Figure', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_figure_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_figure_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_figure_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_figure_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_figure_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_figure_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_figure_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_figure_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_figure_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_figure_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_figure_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_figure_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_figure_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_figure_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_figure_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_figure_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_figure_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_figure_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_figure_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_figure_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }else{
        $this->start_controls_section(
			"wpe_st_fig_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Figure', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'fig_heading',
                [
					'label' => esc_htmlesc_html__( 'Figure Caption Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
     }

    private function data_list_style($prefix = '', $css_selector = '.wpe-text-editor dl', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_data_list_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Data list', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_data_list_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_data_list_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_data_list_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_data_list_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_control(
            "wpe_st_data_list_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_data_list_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_data_list_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_data_list_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_data_list_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_data_list_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_data_list_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_data_list_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_data_list_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_data_list_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_data_list_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_data_list_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_data_list_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_data_list_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_data_list_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_data_list_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_dl_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Data List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'dl_heading',
                [
					'label' => esc_htmlesc_html__( 'Data List Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function order_list_style($prefix = '', $css_selector = '.wpe-text-editor ol', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_order_list_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Order List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_order_list_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_order_list_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_order_list_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_order_list_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_order_list_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_order_list_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_order_list_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_order_list_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_order_list_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_order_list_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_order_list_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_order_list_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_order_list_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_order_list_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_order_list_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_order_list_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_order_list_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_order_list_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_order_list_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_order_list_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    
    }
    else{
        $this->start_controls_section(
			"wpe_st_ol_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Order List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'ol_heading',
                [
					'label' => esc_htmlesc_html__( 'Oder List Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function unorder_list_style($prefix = '', $css_selector = '.wpe-text-editor ul', $show_section = false)
    {
        
        if($show_section==true){
		$this->start_controls_section(
			"wpe_st_unorder_list_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Unorder List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_unorder_list_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_unorder_list_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_unorder_list_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_unorder_list_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_unorder_list_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_unorder_list_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_unorder_list_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_unorder_list_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_unorder_list_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_unorder_list_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_unorder_list_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_unorder_list_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_unorder_list_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_unorder_list_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_unorder_list_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_unorder_list_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_unorder_list_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_unorder_list_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_unorder_list_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_unorder_list_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_ul_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Onorder List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'unorder_heading',
                [
					'label' => esc_htmlesc_html__( 'Unorder Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function image_style($prefix = '', $css_selector = '.wpe-text-editor img', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_image_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Image', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_image_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_image_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_image_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->add_responsive_control(
            "wpe_st_image_width_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Width', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_space_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Max Width', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_height_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Height', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_object_fit_normal{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Object Fit', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'condition' => [
                    'height[size]!' => '',
                ],
                'options' => [
					''        => esc_htmlesc_html__( 'Default', 'wpessential-elementor-blocks' ),
					'fill'    => esc_htmlesc_html__( 'Fill', 'wpessential-elementor-blocks' ),
					'cover'   => esc_htmlesc_html__( 'Cover', 'wpessential-elementor-blocks' ),
					'contain' => esc_htmlesc_html__( 'Contain', 'wpessential-elementor-blocks' ),
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_object_position_normal{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Object Position', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'center center' => esc_htmlesc_html__( 'Center Center', 'wpessential-elementor-blocks' ),
					'center left'   => esc_htmlesc_html__( 'Center Left', 'wpessential-elementor-blocks' ),
					'center right'  => esc_htmlesc_html__( 'Center Right', 'wpessential-elementor-blocks' ),
					'top center'    => esc_htmlesc_html__( 'Top Center', 'wpessential-elementor-blocks' ),
					'top left'      => esc_htmlesc_html__( 'Top Left', 'wpessential-elementor-blocks' ),
					'top right'     => esc_htmlesc_html__( 'Top Right', 'wpessential-elementor-blocks' ),
					'bottom center' => esc_htmlesc_html__( 'Bottom Center', 'wpessential-elementor-blocks' ),
					'bottom left'   => esc_htmlesc_html__( 'Bottom Left', 'wpessential-elementor-blocks' ),
					'bottom right'  => esc_htmlesc_html__( 'Bottom Right', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'center center',
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-position: {{VALUE}};',
                ],
                'condition' => [
                    'object-fit' => 'cover',
                ],
            ]
        );

        $this->add_control(
            "wpe_st_image_seperator_panel_style_normal{$prefix}",
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control(
            "wpe_st_image_opacity_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Opacity', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_image_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_image_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_image_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_image_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_image_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_image_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_image_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_image_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );


        $this->add_responsive_control(
            "wpe_st_image_width_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Width', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_space_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Max Width', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_height_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Height', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_object_fit_hover{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Object Fit', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'condition' => [
                    'height[size]!' => '',
                ],
                'options' => [
					''        => esc_htmlesc_html__( 'Default', 'wpessential-elementor-blocks' ),
					'fill'    => esc_htmlesc_html__( 'Fill', 'wpessential-elementor-blocks' ),
					'cover'   => esc_htmlesc_html__( 'Cover', 'wpessential-elementor-blocks' ),
					'contain' => esc_htmlesc_html__( 'Contain', 'wpessential-elementor-blocks' ),
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_image_object_position_hover{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Object Position', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'center center' => esc_htmlesc_html__( 'Center Center', 'wpessential-elementor-blocks' ),
					'center left'   => esc_htmlesc_html__( 'Center Left', 'wpessential-elementor-blocks' ),
					'center right'  => esc_htmlesc_html__( 'Center Right', 'wpessential-elementor-blocks' ),
					'top center'    => esc_htmlesc_html__( 'Top Center', 'wpessential-elementor-blocks' ),
					'top left'      => esc_htmlesc_html__( 'Top Left', 'wpessential-elementor-blocks' ),
					'top right'     => esc_htmlesc_html__( 'Top Right', 'wpessential' ),
					'bottom center' => esc_htmlesc_html__( 'Bottom Center', 'wpessential' ),
					'bottom left'   => esc_htmlesc_html__( 'Bottom Left', 'wpessential' ),
					'bottom right'  => esc_htmlesc_html__( 'Bottom Right', 'wpessential' ),
                ],
                'default' => 'center center',
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-position: {{VALUE}};',
                ],
                'condition' => [
                    'object-fit' => 'cover',
                ],
            ]
        );

        $this->add_control(
            "wpe_st_image_seperator_panel_style_hover{$prefix}",
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_control(
            "wpe_st_image_hover_animation_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );
        $this->add_control(
            "wpe_st_image_opacity_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Opacity', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            "wpe_st_image_transion_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Transition Duration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0.3,
                ],
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-img img' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->add_control(
            "wpe_st_image_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_image_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_image_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_image_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_image_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_image_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_image_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_image_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Image', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'image_heading',
                [
					'label' => esc_htmlesc_html__( 'Image Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function address_style($prefix = '', $css_selector = '.wpe-text-editor address', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_address_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Address', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_address_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_address_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_address_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_address_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_address_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_address_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_address_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_address_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_address_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_address_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_address_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_address_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_address_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_address_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_address_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_address_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_address_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_address_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_address_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_address_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
   
    }
    else{
        $this->start_controls_section(
			"wpe_st_address_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Address', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'address_heading',
                [
					'label' => esc_htmlesc_html__( 'Address Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
     }

    private function fig_caption_style($prefix = '', $css_selector = '.wpe-text-editor fig_caption', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_fig_caption_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Fig caption', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_fig_caption_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_fig_caption_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_fig_caption_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_fig_caption_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_fig_caption_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_fig_caption_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_fig_caption_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_fig_caption_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_fig_caption_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_fig_caption_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_fig_caption_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_fig_caption_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_fig_caption_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_fig_caption_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_fig_caption_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_fig_caption_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_fig_caption_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_fig_caption_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_fig_caption_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_fig_caption_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_fig_cap_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Figure Caption', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'fig_caption_heading',
                [
					'label' => esc_htmlesc_html__( 'Figure Caption Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function sub_script_style($prefix = '', $css_selector = '.wpe-text-editor sub', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_sub_script_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Sub script', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_sub_script_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_sub_script_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_sub_script_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_sub_script_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_sub_script_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_sub_script_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_sub_script_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_sub_script_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_sub_script_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_sub_script_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_sub_script_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_sub_script_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_sub_script_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_sub_script_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_sub_script_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_sub_script_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_sub_script_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_sub_script_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_sub_script_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_sub_script_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }else{
        $this->start_controls_section(
			"wpe_st_sub_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Sub Script', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'sub_heading',
                [
					'label' => esc_htmlesc_html__( 'Sub Script Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function super_script_style($prefix = '', $css_selector = '.wpe-text-editor sup', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_super_script_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Super script', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_super_script_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_super_script_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_super_script_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_super_script_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_super_script_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_super_script_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_super_script_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_super_script_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_super_script_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_super_script_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_super_script_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_super_script_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_super_script_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_super_script_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_super_script_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_super_script_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_super_script_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_super_script_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_super_script_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_super_script_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_sup_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Super Script', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'sup_heading',
                [
					'label' => esc_htmlesc_html__( 'Super Script Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
     }

    private function audio_style($prefix = '', $css_selector = '.wpe-text-editor audio', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_audio_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Audio', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_audio_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_audio_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_audio_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_audio_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_audio_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_audio_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_audio_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_audio_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_audio_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_audio_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_audio_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Audio', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'audio_heading',
                [
					'label' => esc_htmlesc_html__( 'Audio Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function video_style($prefix = '', $css_selector = '.wpe-text-editor video', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_video_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Video', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_video_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_video_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_video_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_video_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_video_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_video_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_video_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_video_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_video_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_video_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );


        $this->end_controls_section();
    }else{
        $this->start_controls_section(
			"wpe_st_video_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Video', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'video_heading',
                [
					'label' => esc_htmlesc_html__( 'Video Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function iframe_style($prefix = '', $css_selector = '.wpe-text-editor iframe', $show_section = false)
    {
        if($show_section==true){
        
		$this->start_controls_section(
			"wpe_st_iframe_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'iframe', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_iframe_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_iframe_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_iframe_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_iframe_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_iframe_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_iframe_background{$prefix}",
                'types' => ['classic', 'gradient', 'iframe'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_iframe_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_iframe_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_iframe_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_iframe_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );


        $this->end_controls_section();
     }
      else{
        $this->start_controls_section(
			"wpe_st_iframe_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'iFrame', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'iframe_heading',
                [
					'label' => esc_htmlesc_html__( 'iframe Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function block_qoute_style($prefix = '', $css_selector = '.wpe-text-editor block-qoute', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_block_qoute_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Block Qoute', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_block_qoute_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_block_qoute_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_block_qoute_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_block_qoute_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_control(
            "wpe_st_block_qoute_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_block_qoute_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_block_qoute_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_block_qoute_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_block_qoute_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_block_qoute_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_block_qoute_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_block_qoute_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_block_qoute_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_block_qoute_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_block_qoute_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_block_qoute_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_block_qoute_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_block_qoute_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_block_qoute_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_block_qoute_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Block Qoute', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'block_qoute_heading',
                [
					'label' => esc_htmlesc_html__( 'Block Qoute Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
     }

    private function hr_style($prefix = '', $css_selector = '.wpe-text-editor hr', $show_section = false)
    {
        if($show_section==true){
        $this->start_controls_section(
			"wpe_st_hr_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'hr', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will set condtion for normal or hover
        $this->start_controls_tabs("tabs_hr_style{$prefix}");
        // for normal controls
        $this->start_controls_tab(
            "tab_hr_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_hr_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_hr_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_hr_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_hr_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_hr_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_hr_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_hr_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_hr_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_hr_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_hr_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_hr_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_hr_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_hr_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_hr_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_hr_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_hr_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_hr_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_hr_hover_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }
    else{
        $this->start_controls_section(
			"wpe_st_hr_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Hr', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'hr_heading',
                [
					'label' => esc_htmlesc_html__( 'Hr Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

    private function table_style($prefix = '', $css_selector = '.wpe-text-editor table', $show_section = false)
    {
        if($show_section==true){
		$this->start_controls_section(
			"wpe_st_table_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Table', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        // this will be contain two tabs normal and hover inside
        $this->start_controls_tabs("tabs_table_style{$prefix}");
        // this is the start of normal tab
        $this->start_controls_tab(
            "tab_table_normal{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Normal', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_table_typography{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_responsive_control(
            "wpe_st_table_text_padding{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Padding', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_responsive_control(
            "wpe_st_table_margin{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Margin', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => "wpe_st_table_text_stroke{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_control(
            "wpe_st_table_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_table_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_table_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_table_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "wpe_st_table_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_table_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "wpe_st_tab_table_hover{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Hover', 'wpessential-elementor-blocks' ),
            ]
        );

        $this->add_control(
            "wpe_st_table_hover_text_color{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => "wpe_st_table_hover_background{$prefix}",
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => "wpe_st_table_hover_border{$prefix}",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );
        $this->add_control(
            "wpe_st_table_hover_text_decoration{$prefix}",
            [
				'label'   => esc_htmlesc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'none'         => esc_htmlesc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_htmlesc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_htmlesc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_htmlesc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
                ],
                'default' => 'none',
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}"  => 'text-decoration: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            "wpe_st_table_hover_text_shadow{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
                ],
            ]
        );
        $this->add_responsive_control(
            "wpe_st_table_hover_border_radius{$prefix}",
            [
				'label' => esc_htmlesc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$css_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => "wpe_st_table_hover_typography{$prefix}
                ",
                'selector' => "{{WRAPPER}} {$css_selector}",
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    else{
        $this->start_controls_section(
			"wpe_st_table_style{$prefix}",
			[
				'label' => esc_htmlesc_html__( 'Table', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'table_heading',
                [
					'label' => esc_htmlesc_html__( 'Table Style', 'wpessential-elementor-blocks' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();
        }
    }

}
