Feature: Example Feature Test

    Scenario: Example Positive Scenario
        When I have an example "test"
        Then value is "test"

    Scenario: Example Negative Scenario
        When I have an example "test 42"
        Then value is "test"
