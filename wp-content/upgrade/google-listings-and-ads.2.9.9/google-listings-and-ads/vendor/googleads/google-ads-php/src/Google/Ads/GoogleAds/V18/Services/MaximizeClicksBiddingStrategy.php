<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V18\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Maximize Clicks Bidding Strategy.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.services.MaximizeClicksBiddingStrategy</code>
 */
class MaximizeClicksBiddingStrategy extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The daily target spend in micros to be used for estimation. A
     * minimum value is enforced for the local currency used in the campaign. An
     * error will occur showing the minimum value if this field is set too low.
     *
     * Generated from protobuf field <code>int64 daily_target_spend_micros = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $daily_target_spend_micros = 0;
    /**
     * Ceiling on max CPC bids in micros.
     *
     * Generated from protobuf field <code>optional int64 max_cpc_bid_ceiling_micros = 2;</code>
     */
    protected $max_cpc_bid_ceiling_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $daily_target_spend_micros
     *           Required. The daily target spend in micros to be used for estimation. A
     *           minimum value is enforced for the local currency used in the campaign. An
     *           error will occur showing the minimum value if this field is set too low.
     *     @type int|string $max_cpc_bid_ceiling_micros
     *           Ceiling on max CPC bids in micros.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The daily target spend in micros to be used for estimation. A
     * minimum value is enforced for the local currency used in the campaign. An
     * error will occur showing the minimum value if this field is set too low.
     *
     * Generated from protobuf field <code>int64 daily_target_spend_micros = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int|string
     */
    public function getDailyTargetSpendMicros()
    {
        return $this->daily_target_spend_micros;
    }

    /**
     * Required. The daily target spend in micros to be used for estimation. A
     * minimum value is enforced for the local currency used in the campaign. An
     * error will occur showing the minimum value if this field is set too low.
     *
     * Generated from protobuf field <code>int64 daily_target_spend_micros = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int|string $var
     * @return $this
     */
    public function setDailyTargetSpendMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->daily_target_spend_micros = $var;

        return $this;
    }

    /**
     * Ceiling on max CPC bids in micros.
     *
     * Generated from protobuf field <code>optional int64 max_cpc_bid_ceiling_micros = 2;</code>
     * @return int|string
     */
    public function getMaxCpcBidCeilingMicros()
    {
        return isset($this->max_cpc_bid_ceiling_micros) ? $this->max_cpc_bid_ceiling_micros : 0;
    }

    public function hasMaxCpcBidCeilingMicros()
    {
        return isset($this->max_cpc_bid_ceiling_micros);
    }

    public function clearMaxCpcBidCeilingMicros()
    {
        unset($this->max_cpc_bid_ceiling_micros);
    }

    /**
     * Ceiling on max CPC bids in micros.
     *
     * Generated from protobuf field <code>optional int64 max_cpc_bid_ceiling_micros = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMaxCpcBidCeilingMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->max_cpc_bid_ceiling_micros = $var;

        return $this;
    }

}

