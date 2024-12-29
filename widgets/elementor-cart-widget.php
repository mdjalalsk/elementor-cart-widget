<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Test Cart Widget.
 *
 * Elementor widget that displays a cart message.
 *
 * @since 1.0.0
 */
class Elementor_Product_Cart extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Test Cart Widget name.
     *
     * @access public
     * @return string Widget name.
     * @since  1.0.0
     */
    public function get_name(): string
    {
        return 'test_cart_widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Test Cart Widget title.
     *
     * @access public
     * @return string Widget title.
     * @since  1.0.0
     */
    public function get_title(): string
    {
        return esc_html__('Test Cart Widget', 'elementor-cart-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Test Cart Widget icon.
     *
     * @access public
     * @return string Widget icon.
     * @since  1.0.0
     */
    public function get_icon(): string
    {
        return 'eicon-info-box
';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Test Cart Widget is a member of.
     *
     * @access public
     * @return array Widget categories.
     * @since  1.0.0
     */
    public function get_categories(): array
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords associated with the Test Cart Widget.
     *
     * @access public
     * @return array Widget keywords.
     * @since  1.0.0
     */
    public function get_keywords(): array
    {
        return ['product cart', 'shop', 'store', 'cart'];
    }

    /**
     * Register Test Cart Widget Controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     * @since  1.0.0
     */
    protected function register_controls(): void
    {
        //Start content section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-cart-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cart_image',
            [
                'label' => esc_html__('Image', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'cart_title',
            [
                'label' => esc_html__('Title', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__('Enter your title', 'elementor-cart-widget'),
            ]
        );
        $this->add_control(
            'cart_description',
            [
                'label' => esc_html__('Description', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => esc_html__('Enter your description', 'elementor-cart-widget'),
            ]
        );
        $this->end_controls_section();
        //End content section
        
        //Start Style section
        //start Cart Style section
        $this->start_controls_section(
            'cart_style_section',
            [
                'label' => esc_html__('Cart', 'elementor-cart-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cart_content_alignment',
            [
                'label' => esc_html__('Content Alignment', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .test-cart-widget' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //start Cart Style section

        //Start Image Styling Controls
        $this->start_controls_section(
            'img_style_section',
            [
                'label' => esc_html__('Image', 'elementor-cart-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_size',
            [
                'label' => esc_html__('Size', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_alignment',
            [
                'label' => esc_html__('Alignment', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image' => 'display: flex; justify-content: {{VALUE}}; align-items: center;',
                ],
            ]
        );
        $this->add_responsive_control('
        image_margin',
            [
                'label' => esc_html__('Margin', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_border_width',
            [
                'label' => esc_html__('Border Width (px)', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 20,
                'step' => .5,
                'default' => 1,
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image img' => 'border-width: {{VALUE}}px; border-style: solid;', // Ensure border style is applied.
                ],
            ]
        );
        $this->add_control(
            'image_border_color',
            [
                'label' => esc_html__('Border Color', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image img' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__('Padding', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //End Image Styling Controls
        
        // Start title Styling Controls
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Title', 'elementor-cart-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'elementor-cart-widget'),
                'selector' => '{{WRAPPER}} .test-cart-content h2',
            ]
        );
        $this->add_control(
            'title_alignment',
            [
                'label' => esc_html__('Title Alignment', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content h2' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End title Styling Controls

        // Start Description Styling Controls
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description', 'elementor-cart-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content .test-cart-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => esc_html__('Typography', 'elementor-cart-widget'),
                'selector' => '{{WRAPPER}} .test-cart-content .test-cart-des',
            ]
        );
        $this->add_control(
            'description_alignment',
            [
                'label' => esc_html__('Alignment', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify', 'elementor-cart-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content .test-cart-des' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_padding',
            [
                'label' => esc_html__('Padding', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content .test-cart-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'elementor-cart-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .test-cart-content .test-cart-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Description Styling Controls
        // End Style section

    }

    /**
     * Render Test Cart Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     * @since  1.0.0
     */
    protected function render(): void
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="test-cart-widget">
            <div class="test-cart-image">
                <img src="<?php echo esc_url($settings['cart_image']['url']); ?>"
                     alt="<?php echo esc_attr($settings['cart_title']); ?>">
            </div>
            <div class="test-cart-content">
                <h2><?php echo esc_html($settings['cart_title']); ?></h2>
                <p class="test-cart-des"><?php echo esc_html($settings['cart_description']); ?></p>
            </div>
        </div>
        <?php
    }

    /**
     * Render Test Cart Widget output on the admin.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     * @since  1.0.0
     */
    protected function _content_template(): void
    {
        ?>
        <div class="test-cart-widget">
            <div class="test-cart-image">
                <img src="{{{ settings.cart_image.url }}}" alt="{{{ settings.cart_title }}}">
            </div>
            <div class="test-cart-content">
                <h2>{{{ settings.cart_title }}}</h2>
                <p class="test-cart-des">{{{ settings.cart_description }}}</p>
            </div>
        </div>
        <?php
    }

}

